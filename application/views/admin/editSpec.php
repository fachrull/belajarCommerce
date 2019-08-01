<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
  <h1 class="text-center">Edit Spec</h1>
    <div class="container-fluid">
      <div class="register-box mt-0">
        <div class="register-box-body">
          <div class="row">
            <div class="col-md-12 col-sm-6">
              <!-- ALERT -->
              <?php if($this->session->has_userdata('error')): ?>
                <div class="alert alert-mini alert-danger mb-30">
                  <strong>Oh snap!</strong> <?= $this->session->userdata('error')?>
                </div>
              <?php elseif($this->input->post('items') == NULL): ?>
                <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
              <?php endif;?>
              <!-- /ALERT -->
              <?= form_open_multipart('admin/editSpec/'.$spec['id'], array('class' => 'm-0 sky-form')); ?>
                <label class="input mb-10">
                  <input class="form-control" name="items" type="text" placeholder="Spec" value="<?= $spec['name']?>">
                </label>
                <div class="col-xs-12 text-center mb-20">
                    <img id="iconSpec" style="width:100px !important; height:100px;" src="<?= base_url('asset/spec/'. $spec['icon']);?>">
                </div>
                <label class="input mb-10">
                    <input type="file" name="specPict" id="file"/>
                </label>
                <div class="row">
                  <div class="col-md-6">
                    <a href="<?= site_url('admin/sa_spec')?>" class="btn btn-oldblue btn-default">Back</a>
                  </div>
                  <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-oldblue btn-default"></i>Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
