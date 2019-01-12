<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Brands</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header pb-0">
          <a href="<?= site_url('admin/addBrand');?>" class="btn btn-oldblue h-30"><i class="fa fa-plus"></i>Brand</a>
          </div>
          <div class="box-body">
            <table id="dataTable" class="table table-bordered table-striped">
          <thead>
            <th>Delete</th>
            <th>Brand</th>
            <th>Detail</th>
          </thead>
          <tbody>
            <?php foreach($brands as $brand): ?>
              <tr>
                <td><a href="#" class="btn btn-oldblue h-30">Delete-<?= $brand['id'];?></a></td>
                <td><?= $brand['name'];?></td>
                <td><a href="<?=site_url('admin/sa_brand/'.$brand['id']);?>" class="btn btn-oldblue h-30">Detail</a></td>
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
