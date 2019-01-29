<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>AGMPEDIA</h1>
  </section>
  <section class="content">
    <div id="page-inner">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
                <?php if($this->session->flashdata('success')): ?>
                  <div class="alert alert-success">
                    <strong>Well done!</strong> <?php echo $this->session->flashdata('success'); ?>
                  </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-xs-12">
                        <a href="<?= site_url('admin/addPedia');?>" class="btn btn-default btn-oldblue h-30 test"><i class="fa fa-plus"></i>AgmPedia</a>
                    </div>
                    <hr class="col-xs-12">
                    <div class="col-md-12">
                        <table id="dataTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Title</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($pedias as $pedia): ?>
                      <tr>
                        <td><?=$no++;?></td>
                        <td><?php echo $pedia['title']; ?></td>
                        <td><?php echo $pedia['date']; ?></td>
                        <td>
                          <a href="#" class="btn btn-success">Active</a>
                          <a href="" class="btn btn-warning">Detail</a>
                          <a href="" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
