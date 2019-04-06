<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3">
        <div class="box">
          <div class="box-body">
          <h2 class="text-center mb-20">
            Add Special Package
            </h2>
          <div class="row mb-20">
            <div class="col-xs-12 mb-20">
              <div class="product-detail">
                <div class="col-xs-12 mb-20">
                  <!-- ALERT -->
                  <?php if($this->session->has_userdata('error')): ?>
                    <div class="alert alert-mini alert-danger mb-30">
                      <strong>Oh snap!</strong> <?= $this->session->flashdata('error');?>
                    </div>
                  <?php elseif($this->input->post('items') == NULL): ?>
                   <?=validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
                  <?php endif;?>
                  <!-- /ALERT -->
                  <form class="m-0 sky-form" action="<?= site_url('admin/addStore_SpecialPackage/'.$id_store)?>" method="post">
                    <label class="input mb-10">
                      <label for="prov">Special Package</label>
                      <select class="select-form form-control" name="specialPackage">
                        <option value="" disabled selected>Select Special Package</option>
                        <?php foreach ($special_packages as $specialPackage): ?>
                          <option value="<?= $specialPackage['id']?>"><?= $specialPackage['name']?></option>
                        <?php endforeach; ?>
                      </select>
                    </label>
                    <input type="hidden" name="idStore" value="<?= $id_store?>">
                    <div class="col-xs-12">
                      <div class="row">
                        <div class="col-md-6 pl-0">
                          <a class="btn btn-default" href="<?= site_url('admin/stores/'.$id_store)?>">Back</a>
                        </div>
                        <div class="col-md-6 text-right">
                          <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i> ADD</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
