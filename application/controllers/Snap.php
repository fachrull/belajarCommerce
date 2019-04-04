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
		  'order_id' => rand(),
		  'gross_amount' => $this->cart->total() // no decimal allowed for creditcard
		);

		$item_details = array();
		foreach ($carts as $item) {
		    $item_detail = array(
		        'id' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['qty'],
                'name' => $item['name'] . ' - ' . $item['sizeName']. ' (' . $item['detailSize'] . ')'
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
            'unit' => 'minute', 
            'duration'  => 2
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
    	$result = json_decode($this->input->post('result_data'));
    	echo 'RESULT <br><pre>';
    	var_dump($result);
    	echo '</pre>' ;

    }
}
