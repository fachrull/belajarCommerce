<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Brands</h1>
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
                <th>Stars</th>
                <th>Position</th>
                <th>Action</th>
              </thead>
              <tbody>
                <?php $no=1; ?>
                <?php foreach($product_bedlinen as $product): ?>
                  <tr>
                    <td><?= $no;?></td>
                    <td><?= $product['name'];?></td>
                    <td><?= $product['stars']?></td>
                    <td><?= $product['position']?></td>
                    <td>
                      <a href="<?= site_url('admin/edit_bed_linen/'.$product['id']);?>"><i class="btn btn-oldblue fa fa-gear"></i></a>
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
