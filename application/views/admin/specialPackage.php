<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Products
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div class="row">
              <div class="col-md-4">
                <a href="<?= site_url('admin/addSpecial_package');?>" class="mb-10 btn btn-oldblue"><i class="fa fa-plus"></i> Add Special Package</a>
              </div>
            </div>
            <hr class="col-xs-12 mt-10">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <th>No</th>
                <th>Special Package</th>
                <th>Price</th>
                <th>Action</th>
              </thead>
              <tbody>
                  <?php $no= 1;foreach ($specialPackages as $specialPackage): ?>
                    <tr>
                      <td><?= $no.'.';?></td>
                      <td><?= $specialPackage['name']?></td>
                      <td><?= 'Rp '.$specialPackage['price'];?></td>
                      <td>
                        <a href="<?= site_url('admin/detailSpecialPackage');?>"><i class="btn btn-oldblue fa fa-info"></i></a>
                        <?php if ($specialPackage['active'] == 1): ?>
                          <a href="<?= site_url('admin/activeSpecialPackage/'.$specialPackage['id']);?>"><i class="btn btn-success fa fa-power-off"></i></a>
                        <?php else: ?>
                          <a href="<?= site_url('admin/activeSpecialPackage/'.$specialPackage['id']);?>"><i class="btn btn-danger fa fa-power-off"></i></a>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php $no++;endforeach; ?>
              </tbody>
            </table>
            <div class="row pb-10">
                <div class="col-xs-12">
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
