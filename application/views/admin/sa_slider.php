<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Cover list</h1>
  </section>
  <section class="content pb-0">
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1">
      <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#header" data-toggle="tab">Header Cover</a></li>
        <li><a href="#addheader" data-toggle="tab">Add Header Cover</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="header">
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
                    <div class="thumbnail" style="padding:14px 14px 0px 14px">
                      <img src="<?= base_url('asset/upload/'.$slide['slide']);?>"><br>
                    </div>
                    <div>
                      <a href="<?= site_url('admin/deleteSlider/'.$slide['id']);?>" onclick="return confirm('Are you sure?')"><i class="btn btn-danger fa fa-trash pull-right fa fa-trash"></i></a>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="addheader">
          <?php if($this->session->has_userdata('error')): ?>
                <div class="alert alert-mini alert-danger mb-30">
                  <strong>Oh snap!</strong> <?= $this->upload->display_errors();?>
                </div>
              <?php endif; ?>
              <!-- /ALERT -->
              <form class="m-0 sky-form" action="<?= site_url('admin/addSlider');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <p class="register-box-msg">Add a new cover</p>
                  <div class="form-group">
                      <label class="input"><b>Upload banner image</b>
                          <p class="help-block text-danger fs-12">Min. Size 2 MB and Resolution 700 x 670 pixels</p>
                          <input type="file" class="mt-5" name="sliderPict" />
                      </label>
                </label>
                  </div>
                  <div class="form-group">
                  <label><strong>Banner Link</strong></label>
                  <input type="text" class="form-control" name="link" placeholder="Enter a link">
                  </div>

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
  </div>
  </section>
</div>
