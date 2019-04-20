<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
  <h1 class="text-center"><?= $spec['name']?></h1>
    <div class="container-fluid">
      <div class="register-box mt-0">
        <div class="register-box-body">
          <div class="row">
            <div class="col-xs-12">
              <table class="table block">
                <tr>
                  <th style="border-top:0">Spec</th>
                  <td style="border-top:0"><?= $spec['name'];?></td>
                </tr>
              </table>
            </div>
            <div class="col-xs-6">
              <a href="<?= site_url('admin/sa_spec')?>" class="btn btn-oldblue">Back</a>
            </div>
            <div class="col-xs-6 text-right">
              <a href="<?= site_url('admin/editSpec/'.$spec['id'])?>" class="btn btn-oldblue">Edit Spec</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
