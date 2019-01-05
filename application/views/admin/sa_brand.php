<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container">
      <h1>Brands</h1>
    </div>
  </section>
  <section class="content">
      <div class="container">
        <div class="row">
            <br>
            <a href="<?= site_url('home/addBrand');?>" class="btn btn-oldblue"><i class="fa fa-plus"></i>Brand</a>
            <br><br>
          <table class="table">
            <thead>
              <th>Delete</th>
              <th>Brand</th>
              <th>Update</th>
              <th>Detail</th>
            </thead>
            <tbody>
              <?php foreach($brands as $brand): ?>
                <tr>
                  <td><a href="#" class="btn btn-oldblue">Delete-<?= $brand['id'];?></a></td>
                  <td><?= $brand['name'];?></td>
                  <td><a href="#" class="btn btn-oldblue">Update-<?= $brand['id'];?></a></td>
                  <td><a href="<?=site_url('home/sa_brand/'.$brand['id']);?>" class="btn btn-oldblue">Detail</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
  </section>

</div>
