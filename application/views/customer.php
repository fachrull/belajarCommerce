<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php print_r($post); ?>

<!-- <div>
  <div class="row">
    <label for="uname">Name</label>
    <input type="text" name="name" value="<?= $post['username']?>" readonly>
  </div>
  <div class="row">
    <label for="date">Born of date</label>
    <input type="text" name="date" value="-" readonly>
  </div>
  <div class="row">
    <label for="gender">Gender</label>
    <input type="text" name="gender" value="-">
  </div>
  <div class="row">
    <label for="email">Email</label>
    <input type="email" name="email" value="<?= $post['email']?>" readonly>
  </div>
  <div class="row">
    <label for="phone1">No Handphone</label>
    <?php if (!isset($post['phone1'])): ?>
      <input type="text" name="phone1" value="-">
    <?php elseif (isset($pos['phone1'])):?>
      <input type="number" name="phone1" value="<?= $post['phone1']?>" readonly>
    <?php elseif (isset($post['phone2'])): ?>
      <input type="number" name="phone2" value="<?= $post['phone2']?>" readonly>
    <?php endif; ?>
  </div>
  <div class="row">
    <a href="<?= site_url('home/editProfile');?>" class="btn">Edit Profile</a>
    <div class="right">
      <a href="#" class="btn warning">Change Password</a>
    </div>
  </div>
</div> -->
