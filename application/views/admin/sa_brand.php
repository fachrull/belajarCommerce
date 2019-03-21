<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Brands</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
              <div class="row">
                  <div class="col-md-12">
                      <a href="<?= site_url('admin/addBrand');?>" class="btn btn-oldblue"><i class="fa fa-plus"></i> Brand</a>
                  </div>
              </div>
              <hr class=col-xs-12>
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <th>No.</th>
                <th>Brand</th>
                <th>Delete</th>
                <th>Detail</th>
              </thead>
              <tbody>
                <?php $no=1; ?>
                <?php foreach($brands as $brand): ?>
                  <tr>
                    <td><?= $no;?></td>
                    <td><?= $brand['name'];?></td>
                    <td><a href="<?= site_url('admin/deleteBrand/'.$brand['id'])?>" onclick="return confirm('Are you sure?')"><i class="btn btn-danger fa fa-trash"></i></a></td>
                    <?php if ($brand['status'] == 1): ?>
                      <td><a href="<?=site_url('admin/activeBrand/'.$brand['id']);?>"><i class="btn btn-success fa fa-power-off"></i></a></td>
                    <?php else: ?>
                      <td><a href="<?=site_url('admin/activeBrand/'.$brand['id']);?>"><i class="btn btn-danger fa fa-power-off"></i></a></td>
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
