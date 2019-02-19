<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= $product['name']?>
      <small> product</small>
    </h1>
  </section>
  <section class="content">
    <img src="<?= base_url('asset/upload/'.$product['image']);?>" alt="<?= $product['name'];?>" style="max-height: 388px; max-width: 405px;">
    <br><hr>
    <div class="row">
      <div class="col-sm-3">
        <h3>Brand : <?= $brand['name'];?></h3>
      </div>
      <div class="col-sm-3">
        <h3>Category: <?= $cat['name'];?></h3>
      </div>
      <div class="col-sm-12">
        <h5>Specification : <?=$spec['name'];?></h5>
      </div>
      <div class="col-sm-12">
        <h5>Size : <?=$size['name'];?> (<?=$size['size'];?>)</h5>
      </div>
      <div class="col-sm-12">
        <h5>Quantity : <?= ($Qnt['quantity'] == NULL? '-':$Qnt['quantity']);?></h5>
      </div>
      <div class="col-sm-12">
        <textarea rows="8" cols="80" disabled><?= $product['description'];?></textarea>
      </div>
    </div><br>
    <a href="<?= site_url('stores/storeProduct');?>" class="btn btn-default">Back</a>
  </section>
</div>
