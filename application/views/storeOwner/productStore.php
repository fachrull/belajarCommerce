<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header">
        <h1>Product list</h1>
      </div>
      <div class="box-body">
          <div class="rows">
            <div class="col-xs-12">
              <?php if($products == NULL):?>
                  <p class="text-center">Tidak ada product yang di tambahkan.</p>
              <?php else:?>
              <table id="dataTable" class="table table-bordered table-striped">
            <thead>
              <th>No.</th>
              <th>Product</th>
              <th>Brand</th>
              <th>Category</th>
              <th>Size</th>
              <th>Stock Awal</th>
              <th>Inbound</th>
              <th>Outbound</th>
              <th>Postpone</th>
              <th>Stock Akhir</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php $no=1; ?>
              <?php foreach($products as $product): ?>
                <tr>
                  <td><?= $no;?></td>
                  <td><?= $product['product_name'];?></td>
                  <td><?= $product['brand']?></td>
                  <td><?= $product['category']?></td>
                  <td><?= $product['size_name'].'('.$product['size_product'].')'?></td>
                  <td>
                    <?= ($product['stock_awal'] != NULL? $product['stock_awal'] : '0')?>
                  </td>
                  <td>
                    <?= ($product['inbound'] != NULL? $product['inbound'] : '0')?>
                  </td>
                  <td>
                    <?= ($product['outbound'] != NULL? $product['outbound'] : '0')?>
                  </td>
                  <td>
                    <?= ($product['postpone'] != NULL? $product['postpone'] : '0')?>
                  </td>
                  <td>
                    <?= ($product['stock_akhir'] != NULL? $product['stock_akhir'] : '0')?>
                  </td>
                  <td>
                    <div class="row">
                      <div class="col-sm-6">
                        <a href="<?= site_url('stores/addQuantity/'.$product['id_store'].'/'.$product['id_product'].'/'.$product['id_product_size']);?>"
                           class="btn btn-oldblue">
                           <i class="fa fa-plus"></i> Inbound
                         </a>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php $no++; ?>
              <?php endforeach; ?>
              <?php endif;?>
            </tbody>
          </table>
            </div>
          </div>
      </div>
    </div>
  </section>
</div>
