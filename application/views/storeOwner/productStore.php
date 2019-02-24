<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        Store Owner
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h1>Product list</h1>
            </div>
            <div class="box-body">
                <?php if ($products == NULL): ?>
                    <p class="text-center">Tidak ada product yang di tambahkan.</p>
                <?php else: ?>
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                    <th>No.</th>
                    <th>Product</th>
                    <th id="sizeProduct">Size</th>
                    <th>Quantity</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $product['name']; ?></td>
                            <td>Some</td>
                            <td>
                                <?= ($product['quantity'] != NULL ? $product['quantity'] : '-') ?>

                            </td>
                            <td>
                                <a href="<?= site_url('stores/addQuantity/' . $product['id_store'] . '/' . $product['id_product'] . '/' . $product['id_product_size']); ?>"
                                   class="btn btn-oldblue" data-toggle="tooltip" title="Add quantity"><i
                                            class="fa fa-plus"></i></a>
                                &nbsp;
                                <a href="<?= site_url('stores/storeProduct/' . $product['id_store'] . '/' . $product['id_product']); ?>"
                                   data-toggle="tooltip" title="Product info"><i
                                            class="btn btn-success fa fa-info"></i></a>

                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
