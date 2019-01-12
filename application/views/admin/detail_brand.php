<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= $brand['name'];?>
      <small>Categories</small>
    </h1>
    <br>
    <a href="<?= site_url('admin/sa_brand/'.$brand['id'].'/'.$add);?>" class="btn btn-oldblue">
      <i class="fa fa-plus"></i>
      Category
    </a><hr>
  </section>
  <section class="content">
    <?php foreach($category as $cat): ?>
      <h3><?= $cat;?></h3>
    <?php endforeach; ?>
  </section>
</div>
