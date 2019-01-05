<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Home
        <small> - All Admin</small>
    </h1>
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="container">
        <div class="row">
          <table class="table">
            <thead>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Phone</th>
              <th>Detail</th>
            </thead>
            <tbody>
              <?php foreach($posts as $post): ?>
                <tr>
                  <td><?= $post['first_name'];?></td>
                  <td><?= $post['last_name'];?></td>
                  <td><?= $post['phone'];?></td>
                  <td><a href="#" class="btn btn-oldblue">Detail</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
