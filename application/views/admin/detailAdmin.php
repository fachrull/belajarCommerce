<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Detail Admin
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
          <h2>
            Admin Name
            </h2>
          <div class="row">
            <div class="col-xs-6 mb-20">
            <img src="<?= base_url('asset/dist/img/user.png');?>">
            </div>
            <div class="col-xs-6 mb-20">
              <div class="product-detail">
                <div class="col-xs-12">
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Username</th>
                        <td><?= $detail_admin['username']?></td>
                      </tr>
                      <tr>
                        <th>First Name</th>
                        <td><?= $detail_admin['first_name']?></td>
                      </tr>
                      <tr>
                        <th>Last Name</th>
                        <td><?= $detail_admin['last_name']?></td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td><?= $detail_admin['email']?></td>
                      </tr>
                      <tr>
                        <th>Phone</th>
                        <td><?= $detail_admin['phone']?></td>
                      </tr>
                      <tr>
                        <th>Role</th>

                        <td><?= ($detail_admin['user_type'] == 1 ? 'Super Admin':'Admin')?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-xs-12">
                  <a href="<?= site_url('admin/resetPassword/'.$detail_admin['user_id']);?>" class="btn btn-oldblue btn-default" style="float:right;">Reset Password</a>
                </div>
              </div>
            </div>
          </div>
          <a href="<?= site_url('admin/listAdmin');?>"><button class="btn btn-oldblue btn-default">Back</button></a>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
