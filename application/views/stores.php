<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<h1>This is stores page.</h1><br>

<a href="<?=site_url('auth/regis');?>" class="btn">+Store</a><br>

<table class="bordered">
  <thead>
    <tr>
      <th>Username</th>
      <th>Email</th>
      <th>Company Name</th>
      <th>Detail</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($posts as $post): ?>
      <tr>
        <td><?= $post['username'];?></td>
        <td><?= $post['email'];?></td>
        <td><?= $post['company_name'];?></td>
        <td><a href="<?=site_url('home/detail/'.$post['id']);?>">Detail</a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
