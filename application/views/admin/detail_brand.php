<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
  <h1 class="text-center"><?= $brand['name']?></h1>
    <div class="container-fluid">
      <div class="register-box mt-0">
        <div class="register-box-body">
          <div class="row">
            <div class="col-xs-12 text-center mb-20">
              <img style="width:100px !important; height:100px;" src="<?= base_url('asset/brands/'.$brand['logo']);?>">
            </div>
            <div class="col-xs-12">
              <table class="table block">
                <tr>
                  <th>Brand</th>
                  <td><?= $brand['name'];?></td>
                </tr>
                <tr>
                  <th>Description</th>
                  <td><?= $brand['description'];?></td>
                </tr>
              </table>
            </div>
            <div class="col-xs-6">
              <a href="<?= site_url('admin/sa_brand')?>" class="btn btn-oldblue">Back</a>
            </div>
            <div class="col-xs-6 text-right">
              <a href="<?= site_url('admin/editBrand/'.$brand['slugs'])?>" class="btn btn-oldblue">Edit Brand</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
