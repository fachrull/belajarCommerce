<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3 col-sm-6 offset-sm-3">
            <!-- ALERT -->
            <?php if($this->session->has_userdata('error')): ?>
              <div class="alert alert-mini alert-danger mb-30">
                <strong>Oh snap!</strong> <?= $this->session->flashdata('error');?>
              </div>
            <?php elseif($this->input->post('items') == NULL): ?>
             <?=validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
            <?php endif;?>
            <!-- /ALERT -->
            <form class="m-0 sky-form boxed" action="<?= site_url('home/addCat');?>" method="post">
              <header>
                  <i class="fa fa-users"></i> Category
              </header>
              <fieldset >
                <label class="input mb-10">
                    <input name="items" type="text" placeholder="Category">
                </label>
              </fieldset>
              <div class="row mb-20">
                  <div class="col-md-12">
                      <button type="submit" class="btn btn-default"><i class="fa fa-plus"></i>ADD</button>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
