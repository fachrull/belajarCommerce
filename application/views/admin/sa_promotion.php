<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Slide list</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-8">
      <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Promotion</a></li>
        <li><a href="#tab_2" data-toggle="tab">Add Promotion</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
              <div class="row">
                  <div class="col-sm-4">
                    <div class="thumbnail p-10">
                      <img src="<?= base_url('asset/upload/1.jpg');?>"><br>
                      <div>
                      <a href="<?= site_url('admin/deleteSlider/');?>" class="btn btn-default h-30" onclick="return confirm('Are you sure?')"><i class="pull-right fa fa-trash text-danger"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="thumbnail p-10">
                      <img src="<?= base_url('asset/upload/1.jpg');?>"><br>
                      <div>
                      <a href="<?= site_url('admin/deleteSlider/');?>" class="btn btn-default h-30" onclick="return confirm('Are you sure?')"><i class="pull-right fa fa-trash text-danger"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="thumbnail p-10">
                      <img src="<?= base_url('asset/upload/1.jpg');?>"><br>
                      <div>
                      <a href="<?= site_url('admin/deleteSlider/');?>" class="btn btn-default h-30" onclick="return confirm('Are you sure?')"><i class="pull-right fa fa-trash text-danger"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="thumbnail p-10">
                      <img src="<?= base_url('asset/upload/1.jpg');?>"><br>
                      <div>
                      <a href="<?= site_url('admin/deleteSlider/');?>" class="btn btn-default h-30" onclick="return confirm('Are you sure?')"><i class="pull-right fa fa-trash text-danger"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="thumbnail p-10">
                      <img src="<?= base_url('asset/upload/1.jpg');?>"><br>
                      <div>
                      <a href="<?= site_url('admin/deleteSlider/');?>" class="btn btn-default h-30" onclick="return confirm('Are you sure?')"><i class="pull-right fa fa-trash text-danger"></i></a>
                      </div>
                    </div>
                  </div>
              </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
        <?php if($this->session->has_userdata('error')): ?>
                <div class="alert alert-mini alert-danger mb-30">
                  <strong>Oh snap!</strong> <?= $this->upload->display_errors();?>
                </div>
              <?php endif; ?>
              <!-- /ALERT -->
              <form class="m-0 sky-form" action="<?= site_url('admin/addSlider');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <p class="register-box-msg">Add a new promotion</p>
                <label class="input mb-10">
                  <input type="file" name="sliderPict" />
                </label>
                <div class="row">
                  <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i>ADD</button>
                  </div>
                </div>
              </form>
        </div>
      </div>
      <!-- /.tab-content -->
    </div>  
    </div>
  </section>
</div>