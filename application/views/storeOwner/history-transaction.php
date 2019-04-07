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
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $no = 1;foreach ($transactions as $transaction): ?>
                        <tr>
                            <td><?= $no?></td>
                            <td><?= $transaction['order_number']?></td>
                            <td><?= $transaction['order_date']?></td>
                            <td><?php echo $transaction['first_name'] . " " .$transaction['last_name']?></td>
                            <td><?= 'Rp '.number_format(floatval($transaction['total']), 0, ',', '.')?></td>
                            <td>
                                <?php
                                switch($transaction['status_order']) {
                                    case 1:
                                        echo "<p class=\"label label-success\">Pesanan Selesai</p>";
                                        break;
                                    case 2:
                                        echo "<p class=\"label label-warning btn-sm\">Menunggu Pembayaran</p>";
                                        break;
                                    case 3:
                                        echo "<p class=\"label label-danger btn-sm\">Pesanan Dibatalkan</p>";
                                        break;
                                    case 4:
                                        echo "<p class=\"label label-secondary btn-sm\">Pesanan diproses</p>";
                                        break;
                                    case 5:
                                        echo "<p class=\"label label-secondary btn-sm\">Pesanan Dikirim</p>";
                                        break;
                                    default:
                                        break;
                                } ?>
                            </td>
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
