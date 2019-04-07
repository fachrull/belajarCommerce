<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3">
        <div class="box">
          <div class="box-body">
          <h2 class="text-center mb-20">
            Add Cluster
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
                  <form class="m-0 sky-form" action="<?= site_url('admin/addCluster/'.$id_store)?>" method="post">
                    <label class="input mb-10">
                      <label for="prov">Province</label>
                      <select class="select-form form-control" id="province" name="province">
                        <option value="">Select Province</option>
                        <?php foreach ($provinces as $province): ?>
                          <option value="<?= $province['id_prov']?>"><?= $province['nama']?></option>
                        <?php endforeach; ?>
                      </select>
                    </label>
                    <label class="input mb-10">
                      <label for="cty">City</label>
                      <select class="select-form form-control" id="city" name="city">
                        <option value="">Select City</option>
                      </select>
                    </label>
                    <label class="input mb-10">
                      <label for="subdist">Sub District</label>
                      <select class="select-form form-control" id="sub_district" name="sub_district">
                        <option value="">Select Sub District</option>
                      </select>
                    </label>
                    <label class="input mb-10">
                      <input class="form-control" type="hidden" name="id_store" value="<?= $id_store?>">
                    </label>
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
