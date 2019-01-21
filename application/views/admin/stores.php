<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Manage Store</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
          <table id="dataTable" class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Company Name</th>
              <th>Address</th>
              <th>Sub District</th>
              <th>City</th>
              <th>Province</th>
              <th>Phone</th>
              <th>Detai</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; ?>
            <?php foreach($posts as $post): ?>
              <tr>
                <td><?= $no;?></td>
                <td><?= $post['company_name'];?></td>
                <td><?= $post['address'];?></td>
                <td><?= $post['sub_district'];?></td>
                <td><?= $post['city'];?></td>
                <td><?= $post['province'];?></td>
                <td><?= $post['phone1'];?></td>
                <td><a href="<?=site_url('admin/stores/'.$post['id']);?>" type="submit" class="btn btn-oldblue text-white">Detail</a></td>
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
