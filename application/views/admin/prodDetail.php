<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= $product['name']?>
      <small> Product</small>
    </h1>
  </section>
  <section class="content">
    <img src="<?= base_url('asset/upload/'.$product['image']);?>" alt="<?= $product['name'];?>" style="max-height: 388px; max-width: 405px;">
    <br><hr>
    <div class="row">
      <div class="col-sm-3">
        <h3>Brand : <?=$brand['name'];?></h3>
      </div>
      <div class="col-sm-3">
        <h3>Category: <?=$cat['name'];?></h3>
      </div>
      <div class="col-sm-12">
        <h5>Price : Rp. <?= $product['price'];?></h5>
        <h5>Sub Price : Rp <?=$product['sub_price'];?></h5>
        <h5>Specification : <?=$spec['name'];?></h5>
        <h5>Size : <?=$size['name'];?> (<?=$size['size'];?>)</h5>
        <textarea rows="8" cols="80" disabled><?= $product['description'];?></textarea>
      </div>
    </div>
    <a href="<?= site_url('admin/allProd');?>" class="btn btn-default">Back</a>
  </section>
</div>
