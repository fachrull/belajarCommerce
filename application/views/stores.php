<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<br><a href="<?=site_url('auth/regis');?>" class="btn btn-oldblue"><i class="fa fa-plus"></i>Store</a><br>
<br>
<table class="table">
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
