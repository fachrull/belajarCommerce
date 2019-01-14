<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= $post['company_name'];?>
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs">
        <div class="box">
          <div class="box-header pb-0">
            <p>Owner Name: <?= $post['owner_name'];?></p>
            <p>Email: <?= $prime['email'];?></p>
            <p>Address: <?= $post['address'];?></p>
            <p>Province: <?= $post['province'];?></p>
            <p>City: <?= $post['city'];?></p>
            <p>Sub district: <?= $post['sub_district'];?></p>
            <p>Postcode: <?= $post['postcode'];?></p>
            <?php if ($post['phone1'] != NULL): ?>
              <p>Phone 1: <?=$post['phone1'];?></p>
            <?php else: ?>
              <p>Phone 1: -</p>
            <?php endif; ?>
            <?php if ($post['phone2'] != NULL): ?>
              <p>Phone 2: <?=$post['phone2'];?></p>
            <?php else: ?>
              <p>Phone 2: -</p>
            <?php endif; ?>

            <?php print_r($this->session->userdata()); ?>
            <a href="<?= site_url('admin/storeProd');?>" class="btn btn-default btn-oldblue pull-right"><i class="fa fa-plus"></i> Add product</a>
          </div>
          <div class="box-body">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <th>Product</th>
                <th>Price</th>
                <th>Sub Price</th>
                <th>Quantity</th>
              </thead>
              <tbody>
                <!-- <?php foreach ($products as $product): ?> -->
                  <tr>
                    <td
                      <a href="" class="btn btn-oldblue">Delete</a>
                    </td>
                    <td>product name</td>
                    <td>product price</td>
                    <td>product sub price</td>
                    <td>product quantity</td>
                    <td>
                      <a href="" class="btn btn-oldblue">Detail</a>
                    </td>
                  </tr>
                <!-- <?php endforeach; ?> -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
