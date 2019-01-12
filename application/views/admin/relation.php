<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Add
      <small>category</small>
    </h1>
  </section>
  <section class="content">
    <!-- ALERT -->
    <?php if($this->session->has_userdata('error')): ?>
      <div class="alert alert-mini alert-danger mb-30">
        <strong>Oh snap!</strong> <?= $this->session->userdata('error')?>
      </div>
    <?php endif; ?>
    <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
    <!-- /ALERT -->
    <form action="<?= site_url('admin/sa_brand/'.$brand['id'].'/'.$add);?>" method="post">
      <header>
          <i class="fa fa-users"></i> Brand
      </header>
      <fieldset >
        <label class="select mb-10">
            <select class="custom-control-input" name="cat">
                <label class="input">
                  <option value="0" selected disabled>Category</option>
                </label>
                <?php foreach($cat as $cat): ?>
                  <label class="input">
                    <option value="<?= $cat['id']?>"><?= $cat['name']?></option>
                  </label>
                <?php endforeach; ?>
            </select>
        </label>
        <label class="input mb-10">
          <input type="hidden" name="brand" value="<?= $brand['id'];?>">
        </label>
      </fieldset>
      <div class="row mb-20">
          <div class="col-md-12">
              <button type="submit" class="btn btn-oldblue"><i class="fa fa-plus"></i>ADD</button>
          </div>
      </div>
    </form>
  </section>
</div>
