<?php defined('BASEPATH') or exit('No direct script access allowed') ?>

<div class="content-wrapper">
  <section class="content-header">
      <h1>PROMOTION</h1>
  </section>
  <section class="content">
    <div id="page-inner">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="<?= site_url('admin/addPedia');?>" class="btn btn-oldblue"><i class="fa fa-plus"></i> Promotion</a>
                    </div>
                    <hr class="col-xs-12">
                    <div class="col-md-12">
                        <table id="dataTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Title</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>1</td>
                        <td>Tes</td>
                        <td>
                          <a href="<?= site_url('#')?>"><i class="btn btn-oldblue fa fa-info"></i></a>
                          <a href="#"><i class="btn btn-success fa fa-power-off"></i></a>
                        </td>
                      </tr>
                  </tbody>
                </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

