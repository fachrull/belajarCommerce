<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>Detail Transaksi</h1>
  </section>

    <section class="content">
        <div class="row">
            <div class="col-xs">
                <div class="box">
                    <div class="box-header pb-0">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Nomor Transaksi</th>
                                    <td><?=$detailOrder['order_number'];?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Transaksi</th>
                                    <td><?=$detailOrder['order_date'];?></td>
                                </tr>
                                <tr>
                                    <th>Customer</th>
                                    <td class="word-wrap"><?=$detailOrder['first_name']." ".$detailOrder['last_name']?></td>
                                </tr>
                                <tr>
                                    <th>Alamat Pengiriman</th>
                                    <td class="word-wrap">
                                        <?=$detailOrder['address'].", ".$detailOrder['kecamatan'].', '.$detailOrder['kabupaten'].', '.$detailOrder['provinsi'].', '.$detailOrder['postcode']?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td><?= $detailOrder['phone']?></td>
                                </tr>
                                <tr>
                                    <th>Status Transaksi</th>
                                    <td>
                                        <?php
                                        switch($detailOrder['status_order']) {
                                            case 1:
                                                echo "<p class=\"label label-success\">Pesanan Selesai</p>";
                                                break;
                                            case 2:
                                                echo "<p class=\"label label-warning btn-sm\">Menunggu Pembayaran</p>";
                                                echo " | <button type=\"button\" class=\"btn btn-sm btn-primary\" data-toggle=\"modal\" data-target=\"#modal-default\">
                                            Ubah Status
                                        </button>";
                                                break;
                                            case 3:
                                                echo "<p class=\"label label-danger btn-sm\">Pesanan Dibatalkan</p>";

                                                break;
                                            case 4:
                                                echo "<p class=\"label label-primary btn-sm\">Pesanan diproses</p>";
                                                echo " | <button type=\"button\" class=\"btn btn-sm btn-primary\" data-toggle=\"modal\" data-target=\"#modal-default\">
                                            Ubah Status
                                        </button>";
                                                break;
                                            case 5:
                                                echo "<p class=\"label label-primary btn-sm\">Pesanan Dikirim</p>";
                                                break;
                                            default:
                                                break;
                                        } ?>

                                    </td>
                                    <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Ubah Status Transaksi</h4>
                                                </div>
                                                <form action="<?= site_url('stores/updateTransactionStatus/' . $detailOrder[0]->id . '/' .$detailOrder[0]->id_userlogin); ?>"
                                                      method="post">
                                                    <div class="modal-body">
                                                        <select name="status" class="form-control">
                                                            <option selected disabled>Pilih status</option>
                                                            <?php
                                                            switch($detailOrder[0]->status_order) {
                                                                case 2:
                                                                    echo "<option value=\"3\">Pesanan Dibatalkan</option>";
                                                                    break;
                                                                case 4:
                                                                    echo "<option value=\"1\">Pesanan Selesai</option>";
                                                                    break;
                                                                default:
                                                                    break;
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left"
                                                                data-dismiss="modal">Batal
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Simpan perubahan
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                </tr>

                            </table>
                        </div>

                    </div>
                    <table class="table ml-10">
                        <tr>
                            <th>Daftar Produk</th>
                        </tr>
                    </table>
                    <div class="box-body">
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                            <th>No.</th>
                            <th>Product</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Sub price</th>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($order_list as $order): ?>
                                    <?php if ($order['special'] == TRUE): ?>
                                      <tr>
                                        <td><?= $no?></td>
                                        <td><?= $order['name']?></td>
                                        <td>-</td>
                                        <td><?= $order['quantity']?></td>
                                        <td><?='Rp. '.number_format(floatval($order['subtotal']), 0, ',', '.')?></td>
                                      </tr>
                                    <?php else: ?>
                                      <tr>
                                          <td><?= $no?></td>
                                          <td><?= $order['name']?></td>
                                          <td><?= $order['size_name'].' ('.$order['size'].')'?></td>
                                          <td><?= $order['quantity']?></td>
                                          <td><?= 'Rp '.number_format(floatval($order['subtotal']), 0, ',', '.')?></td>
                                      </tr>
                                    <?php endif; ?>
                                <?php $no++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
