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
        <table id="dataTable" class="table table-bordered table-striped">
          <thead>
            <th>No.</th>
            <th>Product</th>
            <th>Price</th>
            <th>Sub Price</th>
            <th>Quantity</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php $no=1; ?>
            <?php foreach($products as $product): ?>
              <tr>
                <td><?= $no;?></td>
                <td><?= $product['name'];?></td>
                <td>Rp <?= $product['price'];?></td>
                <td>Rp <?= $product['sub_price'];?></td>
                <td>
                  <div class="row">
                    <div class="col-sm-6">
                      <?= ($product['quantity'] != NULL? $product['quantity'] : '-')?>
                    </div>
                    <div class="col-sm-6">
                      <a href="<?= site_url('stores/addQuantity/'.$product['id_store'].'/'.$product['id_product']);?>" class="btn btn-oldblue"><i class="fa fa-plus"></i> Quantity</a>
                    </div>
                  </div>
                </td>
                <td>
                  <a href="<?= site_url('stores/storeProduct/'.$product['id_store'].'/'.$product['id_product']);?>"><i class="btn btn-success fa fa-info"></i></a>
                </td>
              </tr>
              <?php $no++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
