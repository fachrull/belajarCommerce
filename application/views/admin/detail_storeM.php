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
            <?php if ($post['fax'] != NULL): ?>
              <p>Fax: <?=$post['fax'];?></p>
            <?php else: ?>
              <p>Fax: -</p>
            <?php endif; ?>
            <a href="<?= site_url('admin/storeProd/'.$storeId['idStore']);?>" class="btn btn-default btn-oldblue pull-right"><i class="fa fa-plus"></i> Add product</a>
          </div>
          <div class="box-body">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <th>No.</th>
                <th>Product</th>
                <th>Price</th>
                <th>Sub Price</th>
                <th>Quantity</th>
              </thead>
              <tbody>

                  <tr>
                    <td>1.</td>
                    <td>Imperal Heritage</td>
                    <td>Rp 1000000</td>
                    <td>Rp 1500000</td>
                    <td>-</td>
                  </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
