<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Reviews</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <th>No.</th>
                <th>Product</th>
                <th>Date Attempt</th>
                <th>Stars</th>
                <th>Action</th>
              </thead>
              <tbody>
                <?php $no=1; ?>
                <?php foreach($reviews as $review): ?>
                  <tr>
                    <td><?= $no;?></td>
                    <td><?= $review['name'];?></td>
                    <td><?= $review['date_attempt']?></td>
                    <td><?= $review['stars']?></td>
                    <td>
                      <a href="<?= site_url('admin/reviews/'.$review['id']);?>"><i class="btn btn-oldblue fa fa-info"></i></a>
                      <?php if ($review['display'] == 0): ?>
                        <a href="<?= site_url('admin/displayReview/'.$review['id']);?>"><i class="btn btn-danger fa fa-power-off"></i></a>
                      <?php else: ?>
                        <a href="<?= site_url('admin/displayReview/'.$review['id']);?>"><i class="btn btn-success fa fa-power-off"></i></a>
                      <?php endif; ?>
                    </td>
                  </tr>
                  <?php $no++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
