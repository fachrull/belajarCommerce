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
            <p>Province: <?= $province[0]['province'];?></p>
            <p>City: <?= $city[0]['city']?></p>
            <p>Sub district: <?= $sub_district[0]['sub_district']?></p>
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
            <a href="<?= site_url('admin/storeProd/'.$post['id']);?>" class="btn btn-default btn-oldblue pull-right"><i class="fa fa-plus"></i> Add product</a>
          </div>
          <div class="box-body">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <th>No.</th>
                <th>Product</th>
                <th>Quantity</th>
              </thead>
              <tbody>
                <?php if(is_array($products)): ?>
                  <?php $no=1; ?>
                  <?php foreach($products as $product): ?>
                    <tr>
                      <td><?= $no;?></td>
                      <td><?= $product['name'];?></td>
                      <td><?= ($product['quantity'] != NULL? $product['quantity']:'-');?></td>
                      <td>
                        <a href="" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php $no++; ?>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
