<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Best Seller</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?= site_url('admin/addSize');?>" class="btn btn-oldblue h-30">
            <i class="fa fa-plus"></i>
             Size
          </a>
                </div>
            </div>
            <hr class="col-xs-12">
          <table id="dataTable" class="table table-bordered table-striped">
            <thead>
              <th>Position</th>
              <th>Name</th>
            </thead>
            <tbody>
                <tr>
                  <td></td>
                  <td></td>
                 </tr>  
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
