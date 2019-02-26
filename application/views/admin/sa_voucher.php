<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
div.toggle{
    margin-top:0px !important;
}
.toggle-handle{
    height:100% !important;
}
.toggle-on{
    top:3px !important;
}
.toggle-off.btn{
    padding-top:10px !important;
}
table .btn{
    margin:0px !important;
    height:33px !important;
}
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Products
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <a href="<?= site_url('admin/addVoucher');?>" class="mb-10 btn btn-oldblue h-30"><i class="fa fa-plus"></i> Add Voucher</a>
              </div>
            </div>
            <hr class="col-xs-12 mt-10">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <th>No</th>
                <th>Voucher Code</th>
                <th>Discount</th>
                <th>Status</th>
                <th>Action</th>
              </thead>
              <tbody>
                  <tr>
                    <td>1</td>
                    <td>123</td>
                    <td>30%</td>
                    <td><input type="checkbox" checked data-toggle="toggle" class="toggle-voucher"></td>
                    <td>
                      <a href="#" onclick="return confirm('Are you sure?')"><i class="btn btn-danger fa fa-trash" style="height:30px"></i></a>
                    </td>
                  </tr>
              </tbody>
            </table>
            <div class="row pb-10">
                <div class="col-xs-12">
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
