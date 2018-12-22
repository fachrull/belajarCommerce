<?php defined('BASEPATH')or exit('No direct script access allowed'); ?>

<div class="row">
  <div class="row">
    <h5>Username</h5>
    <p><?= $post['username'];?></p>
  </div>
  <div class="row">
    <h5>Email</h5>
    <p><?= $post['email'];?></p>
  </div>
  <div class="row">
    <h5>Company</h5>
    <p><?= $post['company_name'];?></p>
  </div>
  <div class="row">
    <h5>Address 1</h5>
    <?php if($post['user_add1'] === NULL): ?>
      <p>-</p>
    <?php else: ?>
      <p><?= $post['user_add1'];?></p>
    <?php endif; ?>
  </div>
  <div class="row">
    <h5>Address 2</h5>
    <?php if($post['user_add2'] === NULL): ?>
      <p>-</p>
    <?php else: ?>
      <p><?= $post['user_add2'];?></p>
    <?php endif; ?>
  </div>
  <div class="row">
    <h5>City</h5>
    <?php if($post['city'] === NULL): ?>
      <p>-</p>
    <?php else: ?>
      <p><?= $post['city'];?></p>
    <?php endif; ?>
  </div>
  <div class="row">
    <h5>Province</h5>
    <?php if($post['province'] === NULL): ?>
      <p>-</p>
    <?php else: ?>
      <p><?= $post['province'];?></p>
    <?php endif; ?>
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
    <h5>Country</h5>
    <?php if($post['country'] === NULL): ?>
      <p>-</p>
    <?php else: ?>
      <p><?= $post['country'];?></p>
    <?php endif; ?>
  </div>
  <div class="row">
    <h5>Region</h5>
    <?php if($post['region'] === NULL): ?>
      <p>-</p>
    <?php else: ?>
      <p><?= $post['region'];?></p>
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
</div>
