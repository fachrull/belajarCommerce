<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Categories</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header pb-0">
          <a href="<?= site_url('admin/addCat');?>" class="btn btn-oldblue h-30"><i class="fa fa-plus"></i>Category</a>
          </div>
          <div class="box-body">
          <table id="dataTable" class="table table-bordered table-striped">
          <thead>
            <th>Delete</th>
            <th>Category</th>
            <th>Detail</th>
          </thead>
          <tbody>
            <?php foreach($categories as $cat): ?>
              <tr>
                <td><a href="#" class="btn btn-oldblue h-30">Delete-<?=$cat['id'];?></a></td>
                <td><?= $cat['name'];?></td>
                <td><a href="#" class="btn btn-oldblue h-30">Detail</a></td>
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
