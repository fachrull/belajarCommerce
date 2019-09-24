<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
      <h1 class="text-center">ADD CATEGORY</h1>
      <div class="container-fluid">
        <div class="register-box mt-0">
          <div class="register-box-body">
            <div class="row">
              <div class="col-md-12 col-sm-6">
                <!-- ALERT -->
                <?php if($this->session->has_userdata('error')): ?>
                  <div class="alert alert-mini alert-danger mb-30">
                    <strong>Oh snap!</strong> <?= $this->session->flashdata('error');?>
                  </div>
                <?php endif;?>
                <?php if ($_POST): ?>
                  <div class="alert alert-mini alert-danger mb-30">
                    <?=validation_errors('<p>', '</p>');?>
                  </div>
                <?php endif ?>
                <!-- /ALERT -->
                <form class="m-0 sky-form" action="<?= site_url('admin/addCat');?>" method="post">
                  <p class="register-box-msg">Add a new category</p>
                  <label class="input mb-10">
                    <input class="form-control" name="items" type="text" placeholder="Category" value="<?php echo set_value("items") ?>">
                  </label>
                  <label class="input mb-10">
                    <textarea id="editor1" name="desc" rows="8" cols="43" placeholder="Description"><?php echo set_value("desc") ?></textarea>
                  </label>
                  <div class="row">
                      <div class="col-md-12 text-right">
                          <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i>ADD</button>
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
