<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
  <h1 class="text-center"><?= $cat['name']?></h1>
    <div class="container-fluid">
      <div class="register-box mt-0">
        <div class="register-box-body">
          <div class="row">
            <div class="col-xs-12">
              <table class="table block">
                <tr>
                  <th style="border-top:0; border-bottom:1px #f4f4f4 solid !important">Category</th>
                  <td style="border-top:0; border-bottom:1px #f4f4f4 solid !important"><?= $cat['name'];?></td>
                </tr>
                <tr>
                  <th style="border-top:0; border-bottom:1px #f4f4f4 solid !important">Description</th>
                  <td style="border-top:0; border-bottom:1px #f4f4f4 solid !important"><?= $cat['description'];?></td>
                </tr>
              </table>
            </div>
            <div class="col-xs-6">
              <a href="<?= site_url('admin/sa_cat')?>" class="btn btn-oldblue">Back</a>
            </div>
            <div class="col-xs-6 text-right">
              <a href="<?= site_url('admin/editCat/'.$cat['id'])?>" class="btn btn-oldblue">Edit Category</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
