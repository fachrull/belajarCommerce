<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header">
        <h1>History Transaction</h1>
      </div>
      <div class="box-body">
        <table id="dataTable" class="table table-bordered table-striped">
          <thead>
            <th>No.</th>
            <th>No. Invoice</th>
            <th>Tanggal Pembelian</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Action</th>
          </thead>
          <tbody>
                <?php $no = 1;foreach ($transactions as $transaction): ?>
                  <tr>
                    <td><?= $no?></td>
                    <td><?= $transaction['order_number']?></td>
                    <td><?= $transaction['order_date']?></td>
                    <td><?= $transaction['username']?></td>
                    <td><?= 'Rp '.number_format(floatval($transaction['total']), 0, ',', '.')?></td>
                    <td>
                      <a href="<?= site_url('stores/detailTransaction/'.$transaction['id'].'/'.$transaction['id_userlogin']);?>"><i class="btn btn-primary fa fa-info"></i></a>
                    </td>
                  </tr>
                <?php $no++; endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
