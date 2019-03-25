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
                      <input type="text" name="name" value="<?= $address['prov_name']?>" disabled>
                      <input type="hidden" name="province" value="<?= $address['province']?>">
                    </label>
                    <label class="input mb-10">
                      <input type="text" name="name" value="<?= $address['city_name']?>" disabled>
                      <input type="hidden" name="city" value="<?= $address['city']?>">
                    </label>
                    <label class="input mb-10">
                      <input type="hidden" name="id_store" value="<?= $id_store?>">
                    </label>
                    <label class="input mb-10">
                      <select class="select-form" name="sub_district">
                        <option value="">Select Sub District</option>
                        <?php foreach ($sub_districts as $sub_district): ?>
                          <option value="<?= $sub_district['id_kec']?>"><?= $sub_district['nama']?></option>
                        <?php endforeach; ?>
                      </select>
                    </label>
                    <div class="col-xs-12">
                      <div class="row">
                        <div class="col-md-12 text-right">
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
