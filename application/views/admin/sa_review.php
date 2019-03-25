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
                <th>Nama</th>
                <th>Email</th>
                <th>Star</th>
                <th>Action</th>
              </thead>
              <tbody>
                  <tr>
                    <td>1</td>
                    <td>Fredy</td>
                    <td>aku@email.com</td>
                    <td>5</td>
                    <td>
                    <a href="<?= site_url('admin/detail_review')?>" class="btn btn-oldblue"><i class="fa fa-info"></i></a>
                    <a href="#" class="btn btn-success"><i class="fa fa-power-off"></i></a>
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
