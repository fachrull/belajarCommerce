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
                                    <td><?=$detailOrder[0]->order_number;?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Transaksi</th>
                                    <td><?=$detailOrder[0]->order_date;?></td>
                                </tr>
                                <tr>
                                    <th>Customer</th>
                                    <td class="word-wrap"><?=$detailOrder[0]->first_name." ".$detailOrder[0]->last_name?></td>
                                </tr>
                                <tr>
                                    <th>Alamat Pengiriman</th>
                                    <td class="word-wrap">
                                        <?=$detailOrder[0]->address.", ".$detailOrder[0]->kecamatan.', '.$detailOrder[0]->kabupaten.','.$detailOrder[0]->postcode?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td><?= $detailOrder[0]->phone?></td>
                                </tr>
                                <tr>
                                    <th>Status Transaksi</th>
                                    <td>
                                        <p class="label label-danger"><?= $detailOrder[0]->status?></p>
                                        <?php if ($detailOrder[0]->status_order != 1) {
                                            echo " | <button type=\"button\" class=\"btn btn-sm btn-primary\" data-toggle=\"modal\" data-target=\"#modal-default\">
                                            Ubah Status
                                        </button>";
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
                                                            <option value="3">Pesanan Dibatalkan</option>
                                                            <option value="4">Pesanan Diproses</option>
                                                            <option value="5">Pesanan Dikirim</option>
                                                            <option value="1">Pesanan Selesai</option>
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
                                <?php $no = 1; foreach ($detailOrder as $order): ?>
                                    <tr>
                                        <td><?= $no?></td>
                                        <td><?= $order->name?></td>
                                        <td><?= $order->size_name.' ('.$order->size.')'?></td>
                                        <td><?= $order->quantity?></td>
                                        <td><?= 'Rp '.$order->subtotal?></td>
                                    </tr>
                                <?php $no++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>