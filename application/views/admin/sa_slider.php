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
  <section class="content pb-0">
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1">
      <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#bedlinen" data-toggle="tab">Bed Linen Cover</a></li>
        <li><a href="#addbedlinen" data-toggle="tab">Add Bed Linen Cover</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="bedlinen">
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
        <div class="tab-pane" id="addbedlinen">
        <?php if($this->session->has_userdata('error')): ?>
                <div class="alert alert-mini alert-danger mb-30">
                  <strong>Oh snap!</strong> <?= $this->upload->display_errors();?>
                </div>
              <?php endif; ?>
              <!-- /ALERT -->
              <form class="m-0 sky-form" action="<?= site_url('admin/addSlider');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <p class="register-box-msg">Add a new cover</p>
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
  <section class="content pb-0">
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1">
      <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#specialpack" data-toggle="tab">Special Package Cover</a></li>
        <li><a href="#addspecialpack" data-toggle="tab">Add Special Package Cover</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="specialpack">
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
                    <div class="thumbnail"  style="padding:14px 14px 0px 14px">
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
        <div class="tab-pane" id="addspecialpack">
        <?php if($this->session->has_userdata('error')): ?>
                <div class="alert alert-mini alert-danger mb-30">
                  <strong>Oh snap!</strong> <?= $this->upload->display_errors();?>
                </div>
              <?php endif; ?>
              <!-- /ALERT -->
              <form class="m-0 sky-form" action="<?= site_url('admin/addSlider');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <p class="register-box-msg">Add a new cover</p>
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
  <section class="content pb-0">
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1">
      <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#beddingacc" data-toggle="tab">Bedding Accessories Cover</a></li>
        <li><a href="#addbeddingacc" data-toggle="tab">Add Bedding Accessories Cover</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="beddingacc">
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
                    <div class="thumbnail"  style="padding:14px 14px 0px 14px">
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
        <div class="tab-pane" id="addbeddingacc">
        <?php if($this->session->has_userdata('error')): ?>
                <div class="alert alert-mini alert-danger mb-30">
                  <strong>Oh snap!</strong> <?= $this->upload->display_errors();?>
                </div>
              <?php endif; ?>
              <!-- /ALERT -->
              <form class="m-0 sky-form" action="<?= site_url('admin/addSlider');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <p class="register-box-msg">Add a new cover</p>
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
  <section class="content pb-0">
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1">
      <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#bestseller" data-toggle="tab">Best Seller Cover</a></li>
        <li><a href="#addbestseller" data-toggle="tab">Add Best Seller Cover</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="bestseller">
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
                    <div class="thumbnail"  style="padding:14px 14px 0px 14px">
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
        <div class="tab-pane" id="addbestseller">
        <?php if($this->session->has_userdata('error')): ?>
                <div class="alert alert-mini alert-danger mb-30">
                  <strong>Oh snap!</strong> <?= $this->upload->display_errors();?>
                </div>
              <?php endif; ?>
              <!-- /ALERT -->
              <form class="m-0 sky-form" action="<?= site_url('admin/addSlider');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <p class="register-box-msg">Add a new cover</p>
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