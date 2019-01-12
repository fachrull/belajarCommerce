<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= $product['name']?>
      <small> Product</small>
    </h1>
  </section>
  <section class="content">
<<<<<<< HEAD
    <img src="<?= base_url('asset/upload/'.$product['pict']);?>" alt="<?= $product['name'];?>" style="max-height: 388px; max-width: 405px;">
    <p>Brand: <b><?= $brand['name'];?></b></p>
    <p>Category: <b><?= $cat['name'];?></b></p>
    <p>Quantity: <?= $product['quantity'];?></p>
    <p>Comfort Level: <?= $product['comfort_lvl'];?></p>
    <p>Tickness: <?= $product['tickness'];?></p>
    <p>Headboard Type: <?= $product['headboard'];?></p>
    <p>Foundation Type: <?= $product['foundation'];?></p>
    <p>Size : <?= $product['size'];?></p>
    <textarea rows="8" cols="80" disabled><?= $product['description'];?></textarea>
=======
    <h1>This feature will be updated soon</h1>
>>>>>>> 2d924f0472adb59308389fdc4217121d2bd95949
  </section>
</div>
