<?php defined('BASEPATH')or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">

  </section>
  <section class="content">
    <?php print_r($post); ?>
    <br><br><br>
    <?php print_r($prime); ?>
  </section>
</div>

<!-- <div class="row">
  <div class="row">
    <h5>Company Name</h5>
    <p><?= $post['company_name'];?></p>
  </div>
  <div class="row">
    <h5>Owner</h5>
    <p><?= $post['owner_name'];?></p>
  </div>
  <div class="row">
    <h5>Email</h5>
    <p><?= $prime['email'];?></p>
  </div>
  <div class="row">
    <h5>Address</h5>
    <p><?= $post['address'];?></p>
  </div>
  <div class="row">
    <h5>Sub District</h5>
    <p><?= $post['sub_district'];?></p>
  </div>
  <div class="row">
    <h5>City</h5>
    <p><?= $post['city']; ?></p>
  </div>
  <div class="row">
    <h5>Province</h5>
    <p><?= $post['province'];?></p>
  </div>
  <div class="row">
    <h5>Postcode</h5>
    <?php if($post['postcode'] === NULL): ?>
      <p>-</p>
    <?php else: ?>
      <p><?= $post['postcode'];?></p>
    <?php endif; ?>
  </div>
  <div class="row">
    <h5>Phone 1</h5>
    <?php if($post['phone1'] === NULL): ?>
      <p>-</p>
    <?php else: ?>
      <p><?= $post['phone1'];?></p>
    <?php endif; ?>
  </div>
  <div class="row">
    <h5>Phone 2</h5>
    <?php if($post['phone2'] === NULL): ?>
      <p>-</p>
    <?php else: ?>
      <p><?= $post['phone2'];?></p>
    <?php endif; ?>
  </div>
  <div class="row">
    <a href="#" class="right btn">Edit</a>
  </div>
</div> -->
