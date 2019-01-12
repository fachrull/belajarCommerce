<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Home
    </h1>
  </section>
  <section class="content">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header pb-0">
          <h3>Data store owner</h3>
        </div>
        <table id="dataTable" class="table">
          <thead>
            <tr>
              <th>Company Name</th>
              <th>Owner Name</th>
              <th>Address</th>
              <th>Sub District</th>
              <th>City</th>
              <th>Province</th>
              <th>Phone</th>
              <th>Detai</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($posts as $post): ?>
              <tr>
                <td><?= $post['company_name'];?></td>
                <td><?= $post['owner_name'];?></td>
                <td><?= $post['address'];?></td>
                <td><?= $post['sub_district'];?></td>
                <td><?= $post['city'];?></td>
                <td><?= $post['province'];?></td>
                <td><?= $post['phone1'];?></td>
                <td><a href="<?=site_url('home/index/'.$post['id']);?>" type="submit" class="btn btn-oldblue text-white">Detail</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
