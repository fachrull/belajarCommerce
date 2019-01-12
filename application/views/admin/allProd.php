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
<<<<<<< HEAD
          <a href="<?= site_url('admin/addProd');?>" class="btn btn-oldblue h-30"><i class="fa fa-plus"></i> Product</a>
=======
          <a href="<?= site_url('home/addProd');?>" class="btn btn-oldblue h-30"><i class="fa fa-plus"></i> Product</a>
>>>>>>> 2d924f0472adb59308389fdc4217121d2bd95949
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
            <td>
<<<<<<< HEAD
              <a href="<?= site_url('admin/delProd/'.$product['id'])?>" class="btn btn-oldblue">Delete</a>
=======
              <a href="<?= site_url('home/delProd/'.$product['id'])?>" class="btn btn-oldblue">Delete</a>
>>>>>>> 2d924f0472adb59308389fdc4217121d2bd95949
            </td>
            <td><?= $product['name'];?></td>
            <td><?= $product['price'];?></td>
            <td><?= $product['sub_price'];?></td>
            <td><?= $product['quantity'];?></td>
            <td>
<<<<<<< HEAD
              <a href="<?= site_url('admin/allProd/'.$product['id']);?>" class="btn btn-oldblue">Detail</a>
=======
              <a href="<?= site_url('home/allProd/'.$product['id']);?>" class="btn btn-oldblue">Detail</a>
>>>>>>> 2d924f0472adb59308389fdc4217121d2bd95949
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
