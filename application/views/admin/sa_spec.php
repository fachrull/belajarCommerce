<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>List spec</h1>
  </section>
  <section class="content">
    <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?= site_url('admin/addSpec');?>" class="btn btn-oldblue">
            <i class="fa fa-plus"></i> Spec</a>
                </div>
            </div>
            <hr>
          <table id="dataTable" class="table table-bordered table-striped">
            <thead>
              <th>No.</th>
              <th>Name</th>
              <!-- <th>Detail</th> -->
              <th>Action</th>
            </thead>
            <tbody>
              <?php $no=1; ?>
              <?php foreach ($specs as $spec):?>
                <tr>
                  <td><?= $no?></td>
                  <td><?= $spec['name'];?></td>
                  <!-- <td><a href="<?= site_url(''.$spec['id']);?>" class="btn btn-default"><i class="fa fa-edit"></i></a></td> -->
                  <td><a href="<?= site_url('admin/deleteSpec/'.$spec['id']);?>" onclick="return confirm('Are you sure?')"><i class="btn btn-danger fa fa-trash"></i></a></td>
                </tr>
                <?php $no++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
