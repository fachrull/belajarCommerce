<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server--tJLtZ_iEZ3G_oN_ixz3rtF3', 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
		$this->load->helper('url');
        $this->load->model('Mhome', 'mhome');
    }

    public function token()
    {
        $carts = $this->cart->contents();
        $address = $this->mhome->customer_detail($carts[key($carts)]['id_address']);
		// Required
		$transaction_details = array(
		  'order_id' => 'AGM'.date("dmy").rand(1, 999),
		  'gross_amount' => $this->cart->total() // no decimal allowed for creditcard
		);

		$item_details = array();
		foreach ($carts as $item) {
		    $item_detail = array(
		        'id' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['qty'],
                'name' => $item['name'] . ' - ' . $item['sizeName']
            );
		    array_push($item_details, $item_detail);
        }

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => 18000,
		  'quantity' => 3,
		  'name' => "Apple"
		);

		// Optional
		$item2_details = array(
		  'id' => 'a2',
		  'price' => 20000,
		  'quantity' => 2,
		  'name' => "Orange"
		);

		// Optional
//		$item_details = array ($item1_details, $item2_details);

		// Optional
		$billing_address = array(
		  'first_name'    => $address['first_name'],
		  'last_name'     => $address['last_name'],
		  'address'       => $address['address'],
		  'city'          => $address['kabupaten'],
		  'postal_code'   => $address['postcode'],
		  'phone'         => $address['phone'],
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => $address['first_name'],
		  'last_name'     => $address['last_name'],
		  'email'         => $address['email'],
		  'phone'         => $address['phone'],
		  'billing_address'  => $billing_address,
		  'shipping_address' => $billing_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'day',
            'duration'  => 1
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

    public function finish()
    {
        /*
         * TODO:
         * 1. Check status code, fraud status, transaction status
         * Status code must be 2xx, fraud status must be ACCEPT
         * If status code and fraud staus none of the above, throw an error
         *
         * 2. Handle status code:
         * Please refer to https://api-docs.midtrans.com/#status-code for further description
         *
         * 3. Handle transaction status:
         * Please refer to https://api-docs.midtrans.com/#transaction-status for further description
         * These statues will trigger purchasing: pending, settlement and capture
         * These statues will trigger cancellation: cancel, expire and failure
         */
        $successStatusCode = array('200', '201', '202');
    	$result = json_decode($this->input->post('result_data'));
    	if (in_array($result->status_code, $successStatusCode)) {
    	    redirect('home/purchase/'.$result->order_id);
        }
    	echo 'RESULT <br><pre>';
    	print_r($result);
    	echo '</pre>' ;

    }

    public function changeTransactionStatus($orderId, $transactionStatus) {
        $status = array('status_order' => $transactionStatus);
        $condition = array('order_number'=> $orderId);
        $this->mhome->updateData($condition, $status, 'tm_order');
        if($transactionStatus == 3) {
            $data['detailOrder'] = $this->mhome->getDetailOrder($orderId);

            foreach ($data['detailOrder'] as $item) {
                $id = $item->id_tr_product;
                $qty = $item->quantity;
                $qtyStore = $this->mhome->getProducts(array('id' => $id), array('qty' => 'quantity'), 'tr_product', TRUE);
                $newQuanStore = $qtyStore['quantity'] + $qty;
                $quantity = array('quantity' => $newQuanStore);
                $this->mhome->updateData(array('id' => $id), $quantity, 'tr_product');
            }
        }
    }

    public function cancel($orderId) {
	    $this->midtrans->cancel($orderId);
        redirect('home/transactionPage');
    }

    public function notification()
    {
        echo 'test notification handler\n';
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);
        if($result){
            $notif = $this->midtrans->status($result->order_id);
        }
        error_log(print_r($result,TRUE));
        //notification handler sample
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;
        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card'){
                if($fraud == 'challenge'){
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    echo "Transaction order_id: " . $order_id ." is challenged by FDS";
                }
                else {
                    // TODO set payment status in merchant's database to 'Success'
                    $this->changeTransactionStatus($order_id, 4);
                    echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
                }
            }
        }
        else if ($transaction == 'settlement'){
            // TODO set payment status in merchant's database to 'Settlement'
            $this->changeTransactionStatus($order_id, 4);
            echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
        }
        else if($transaction == 'pending'){
            // TODO set payment status in merchant's database to 'Pending'
            echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
        }
        else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            $this->changeTransactionStatus($order_id, 3);
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'Denied'
            $this->changeTransactionStatus($order_id, 3);
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expire.";
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            $this->changeTransactionStatus($order_id, 3);
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is cancel.";
        }
    }
}
