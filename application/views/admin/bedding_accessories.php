<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Bedding Accessories</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#table" data-toggle="tab">List Bedding Accessories</a></li>
                <li><a href="#addcover" data-toggle="tab">Add Cover</a></li>
              </ul>

              <div class="tab-content">
                <div class="tab-pane active" id="table">
                  <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                      <th>No.</th>
                      <th>Product</th>
                      <th>Position</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      <?php $no=1; ?>
                      <?php foreach($product_bedAcc as $product): ?>
                        <tr>
                          <td><?= $no;?></td>
                          <td><?= $product['name'];?></td>
                          <td><?= $product['position']?></td>
                          <td>
                            <a href="<?= site_url('admin/edit_bedding_acc/'.$product['id']);?>"><i class="btn btn-oldblue fa fa-gear"></i></a>
                          </td>
                        </tr>
                        <?php $no++; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>

                <div class="tab-pane" id="addcover">
                  <?php if($slides == NULL): ?>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="alert" style="background: #f4f4f5">
                          <p class="text-center">No data availabe</p>
                        </div>
                      </div>
                    </div>
                    <?php if($this->session->has_userdata('error')): ?>
                      <div class="alert alert-mini alert-danger mb-30">
                        <strong>Oh snap!</strong> <?= $this->session->userdata('error');?>
                      </div>
                    <?php endif; ?>
                    <form class="m-0 sky-form" action="<?= site_url('admin/beddingAcc');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                      <p class="register-box-msg">Add a new cover</p>
                      <label class="input mb-10">
                        <input type="file" name="cover_beddingAcc" />
                      </label>
                      <div class="row">
                        <div class="col-md-12 text-right">
                          <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i>ADD</button>
                        </div>
                      </div>
                    </form>
                  <?php else: ?>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="thumbnail" style="padding:14px 14px 0px 14px">
                          <img src="<?= base_url('asset/upload/bedding-acc-cover/'.$slides['slide']);?>"><br>
                        </div>
                        <div>
                          <a href="<?= site_url('admin/delete_cover_beddingAcc/'.$slides['id']);?>" onclick="return confirm('Are you sure?')"><i class="btn btn-danger fa fa-trash pull-right fa fa-trash"></i></a>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
