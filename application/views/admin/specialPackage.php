<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Special Package
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#table" data-toggle="tab">List Special Package</a></li>
                <li><a href="#addcover" data-toggle="tab">Add Cover</a></li>
              </ul>

              <div class="tab-content">
                <div class="tab-pane active" id="table">
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
                      <?php if ($specialPackages != NULL): ?>
                        <?php $no= 1;foreach ($specialPackages as $specialPackage): ?>
                          <tr>
                            <td><?= $no.'.';?></td>
                            <td><?= $specialPackage['name']?></td>
                            <td>
                              <?= 'Rp '. number_format($specialPackage['Total'],0,',','.');?>
                            </td>
                            <td>
                              <a href="<?= site_url('admin/detailSpecialPackage/'.$specialPackage['id']);?>"><i class="btn btn-oldblue fa fa-info"></i></a>
                              <?php if ($specialPackage['active'] == 1): ?>
                                <a href="<?= site_url('admin/activeSpecialPackage/'.$specialPackage['id']);?>"><i class="btn btn-success fa fa-power-off"></i></a>
                              <?php else: ?>
                                <a href="<?= site_url('admin/activeSpecialPackage/'.$specialPackage['id']);?>"><i class="btn btn-danger fa fa-power-off"></i></a>
                              <?php endif; ?>
                              <a href="<?= site_url('admin/deleteSpecialPackage/'.$specialPackage['id']);?>" onclick="return confirm('Are you sure?')"><i class="btn btn-danger fa fa-trash"></i></a>
                            </td>
                          </tr>
                          <?php $no++;endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                  <div class="row pb-10">
                      <div class="col-xs-12">
                      </div>
                  </div>
                </div>

                <div class="tab-pane" id="addcover">
                  <?php if($slides == NULL): ?>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="alert" style="background: #f4f4f5">
                          <p class="text-center">No data availabe</p>
                        </div>
                      </div>
                    </div>
                    <?php if($this->session->has_userdata('error')): ?>
                      <div class="alert alert-mini alert-danger mb-30">
                        <strong>Oh snap!</strong> <?= $this->session->userdata('error');?>
                      </div>
                    <?php endif; ?>
                    <form class="m-0 sky-form" action="<?= site_url('admin/special_package');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                      <p class="register-box-msg">Add a new cover</p>
                      <label class="input mb-10">
                        <input type="file" name="cover_spPackage" />
                      </label>
                      <div class="row">
                        <div class="col-md-12 text-right">
                          <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i>ADD</button>
                        </div>
                      </div>
                    </form>
                  <?php else: ?>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="thumbnail" style="padding:14px 14px 0px 14px">
                          <img src="<?= base_url('asset/upload/special-package/cover/'.$slides['slide']);?>"><br>
                        </div>
                        <div>
                          <a href="<?= site_url('admin/delete_cover_spPackage/'.$slides['id']);?>" onclick="return confirm('Are you sure?')"><i class="btn btn-danger fa fa-trash pull-right fa fa-trash"></i></a>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
</div>
