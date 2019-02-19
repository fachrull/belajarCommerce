<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    Store Owner
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header">
        <h1>New product list</h1>
      </div>
      <div class="box-body">
        <table id="dataTable" class="table table-bordered table-striped">
          <thead>
            <th>No.</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php if (is_array($products)): ?>
              <?php $no=1; ?>
              <?php foreach($products as $product): ?>
                <tr>
                  <td><?= $no;?></td>
                  <td><?= $product['name'];?></td>
                  <td><?= ($product['quantity'] != NULL? $product['quantity'] : '-')?></td>
                  <td>
                    <a href="<?= site_url('stores/confirmProduct/'.$product['id_store'].'/'.$product['id_product']);?>"><i class="btn btn-success fa fa-check"></i></a>
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
