<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
  <h1 class="text-center">Edit Category</h1>
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
              <?= form_open_multipart('admin/editCat/'.$cat['id'], array('class' => 'm-0 sky-form')); ?>
                <label class="input mb-10">
                  <input class="form-control" name="items" type="text" placeholder="Category" value="<?= $cat['name']?>">
                </label>
                <label class="input mb-10">
                  <textarea id="editor1" name="desc" rows="8" cols="43" placeholder="Description"><?= $cat['description']?></textarea>
                </label>
                <div class="row">
                  <div class="col-md-6">
                    <a href="<?= site_url('admin/sa_cat')?>" class="btn btn-oldblue btn-default">Back</a>
                  </div>
                  <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-oldblue btn-default">Submit</button>
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
