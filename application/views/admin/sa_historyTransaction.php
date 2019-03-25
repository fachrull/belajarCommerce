<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Review</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <th>No.</th>
                <th>Order Number</th>
                <th>Toko</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
              </thead>
              <tbody>
                  <tr>
                    <td>1</td>
                    <td>001</td>
                    <td>Prapatan</td>
                    <td>10/01/2019</td>
                    <td>tes</td>
                    <td>
                    <a href="<?= site_url('admin/detail_review')?>"><i class="btn btn-oldblue fa fa-info"></i></a>
                    <a href="#"><i class="btn btn-success fa fa-power-off"></i></a>
                    </td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
