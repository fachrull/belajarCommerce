<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Home
    </h1>
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
            <table id="dataTable" class="table">
            <thead>
              <th>No.</th>
              <th>Company name</th>
              <th>Username</th>
              <th>Email</th>
            </thead>
            <tbody>
              <?php $no= 1;foreach($posts as $post): ?>
                <tr>
                  <td><?= $no;?></td>
                  <td><?= $post['company_name'];?></td>
                  <td><?= $post['username'];?></td>
                  <td><?= $post['email'];?></td>
                </tr>
              <?php $no++;endforeach; ?>
            </tbody>
          </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
