<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container">
      <h1>Categories</h1>
    </div>
  <section class="content">
    <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <p>AGMPEDIA</p>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                <?php if($this->session->flashdata('success')): ?>
                                <div class="alert alert-success">
                  <strong>Well done!</strong> <?php echo $this->session->flashdata('success'); ?>
                </div>
                                <?php endif; ?>
                                <a href="<?= site_url('home/addPedia');?>" class="btn btn-default"><i class="fa fa-plus"></i>AgmPedia</a>
                                <br><br>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        <?php foreach($pedia->result() as $row): ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->title; ?></td>
                                            <td><?php echo $row->date; ?></td>
                                            <td><a href="<?php echo site_url('home/editPedia'); ?>/<?php echo $row->id; ?>" class="btn btn-warning">Edit</a><a href="<?php echo site_url('home/deletePedia'); ?>/<?php echo $row->id; ?>" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                        <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
  </section>
</div>
