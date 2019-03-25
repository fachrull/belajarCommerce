<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3">
        <div class="box">
          <div class="box-body">
          <h2 class="text-center mb-20">
            <?= $review['name']?>
            </h2>
          <div class="row text-center mb-20">
            <div class="col-xs-12 mb-20">
            <img style="width:100px !important; height:100px;" src="<?= base_url('asset/upload/'.$review['image']);?>">
            </div>
          </div>
          <div class="row mb-20">
            <div class="col-xs-12 mb-20">
              <div class="product-detail">
                <table class="table">
                  <tr>
                    <th>Name: </th>
                    <td><?= $review['username']?></td>
                  </tr>
                  <tr>
                    <th>Email: </th>
                    <td><?= $review['email']?></td>
                  </tr>
                  <tr>
                    <th>Date Attempt: </th>
                    <td><?= $review['date_attempt']?></td>
                  </tr>
                  <tr>
                    <th>Star: </th>
                    <td><?= $review['stars']?></td>
                  </tr>
                  <tr>
                    <th>Comment: </th>
                    <td><?= $review['comment']?></td>
                  </tr>
                </table>
                <div class="row">
                  <div class="col-xs-12">
                    <a href="<?= site_url('admin/reviews')?>" class="btn btn-oldblue">Kembali</a>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
