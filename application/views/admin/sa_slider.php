<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Slide list</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-6">
      <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Slider</a></li>
        <li><a href="#tab_2" data-toggle="tab">Add Slider</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
        <?php $slide_count = count($slides); ?>
            <?php if($slide_count == 0): ?>
              <div class="row">
                <div class="col-sm-12">
                  <div class="alert" style="background: #f4f4f5">
                    <p class="text-center">No data availabe</p>
                  </div>
                </div>
              </div>
            <?php else: ?>
              <div class="row">
                <?php foreach($slides as $slide): ?>
                  <div class="col-sm-12">
                    <div class="thumbnail p-10">
                      <img src="<?= base_url('asset/upload/'.$slide['slide']);?>"><br>
                      <div>
                      <a href="<?= site_url('admin/deleteSlider/'.$slide['id']);?>" class="btn btn-default h-30" onclick="return confirm('Are you sure?')"><i class="pull-right fa fa-trash text-danger"></i></a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
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
                <p class="register-box-msg">Add a new slider</p>
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