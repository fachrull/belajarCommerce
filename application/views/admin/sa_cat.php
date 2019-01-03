<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container">
      <h1>Categories</h1>
    </div>
  <section class="content">
    <div class="container">
      <div class="row">
        <br>
        <a href="<?= site_url('home/addCat');?>" class="btn btn-default"><i class="fa fa-plus"></i>Category</a>
        <br><br>
        <table class="table">
          <thead>
            <th>Delete</th>
            <th>Category</th>
            <th>Update</th>
            <th>Detail</th>
          </thead>
          <tbody>
            <?php foreach($categories as $cat): ?>
              <tr>
                <td><a href="#" class="btn btn-default">Delete-<?=$cat['id'];?></a></td>
                <td><?= $cat['name'];?></td>
                <td><a href="#" class="btn btn-default">Update-<?=$cat['id'];?></a></td>
                <td><a href="#" class="btn btn-default">Detail</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
