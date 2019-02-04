<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Categories</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?= site_url('admin/addCat');?>" class="btn btn-oldblue h-30"><i class="fa fa-plus"></i>Category</a>
                </div>
            </div>
            <hr class="col-xs-12">
          <table id="dataTable" class="table table-bordered table-striped">
          <thead>
            <th>No.</th>
            <th>Category</th>
            <th>Delete</th>
            <th>Detail</th>
          </thead>
          <tbody>
            <?php $no=1; ?>
            <?php foreach($categories as $cat): ?>
              <tr>
                <td><?=$no;?></td>
                <td><?= $cat['name'];?></td>
                <td><a href="<?= site_url('admin/deleteCat/'.$cat['id']);?>" class="btn btn-danger h-30" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></td>
                <?php if ($cat['status'] == 1): ?>
                  <td><a href="<?= site_url('admin/activeCat/'.$cat['id']);?>" class="btn btn-success h-30">Active</a></td>
                <?php else: ?>
                  <td><a href="<?= site_url('admin/activeCat/'.$cat['id']);?>" class="btn btn-danger h-30">Inactive</a></td>
                <?php endif; ?>
              </tr>
              <?php $no++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
