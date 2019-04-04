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
                        <a href="<?= site_url('admin/addPedia');?>" class="btn btn-default btn-oldblue"><i class="fa fa-plus"></i> Article</a>
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
                          <a href="#"><i class="btn btn-success fa fa-power-off"></i></a>
                          <a href="<?=site_url('admin/detailpedia/'.$pedia['id']);?>"><i class="btn btn-oldblue fa fa-info"></i></a>
                          <a href="#" onclick="return confirm('Are you sure?')"><i class="btn btn-danger fa fa-trash"></i></a>
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
