<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Products
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs">
        <div class="box">
          <div class="box-header pb-0">
          <a href="<?= site_url('admin/addProd');?>" class="btn btn-oldblue h-30"><i class="fa fa-plus"></i> Product</a>
          </div>
          <div class="box-body">
          <table id="dataTable" class="table table-bordered table-striped">
      <thead>
        <th>Delete</th>
        <th>Product</th>
        <th>Price</th>
        <th>Sub Price</th>
        <th>Quantity</th>
        <th>Detail</th>
      </thead>
      <tbody>
        <?php foreach ($products as $product): ?>
          <tr>
            <td
              <a href="<?= site_url('admin/delProd/'.$product['id'])?>" class="btn btn-oldblue">Delete</a>
            </td>
            <td><?= $product['name'];?></td>
            <td><?= $product['price'];?></td>
            <td><?= $product['sub_price'];?></td>
            <td><?= $product['quantity'];?></td>
            <td>
              <a href="<?= site_url('admin/allProd/'.$product['id']);?>" class="btn btn-oldblue">Detail</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
