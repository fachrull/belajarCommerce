<?php defined('BASEPATH') or exit('No directt script access allowed'); ?>

<?php if($this->session->has_userdata('error')): ?>
  <script>
    alert('<?= $this->session->userdata('error')?>');
  </script>
<?php endif; ?>

<form action="<?= site_url('auth/regis');?>" method="post">
  <div class="row">
    <label for="uname">Username:</label>
    <input type="text" name="uname">
  </div>
  <div class="row">
    <label for="password">Password:</label>
    <input type="password" name="password">
  </div>
  <div class="row">
    <label for="email">Email:</label>
    <input type="email" name="email">
  </div>
  <div class="row">
    <label for="company">Company Name:</label>
    <input type="text" name="company">
  </div>
  <?php if($this->session->userdata('uType') == 1): ?>
    <div class="row">
      <label for="add1">Address 1:</label>
      <textarea name="add1" rows="8" cols="80"></textarea>
    </div>
    <div class="row">
      <label for="add2">Address 2:</label>
      <textarea name="add2" rows="8" cols="80"></textarea>
    </div>
    <div class="row">
      <label for="pCode">Postcode:</label>
      <input type="text" name="pCode">
    </div>
    <div class="row">
      <label for="city">City:</label>
      <input type="text" name="city">
    </div>
    <div class="row">
      <label for="country">Country:</label>
      <input type="text" name="country">
    </div>
    <div class="row">
      <label for="region">Region</label>
      <input type="text" name="region">
    </div>
    <div class="row">
      <label for="phone1">Phone 1:</label>
      <input type="text" name="phone1">
    </div>
    <div class="row">
      <label for="phone2">Phone 2</label>
      <input type="text" name="phone2">
    </div>
  <?php endif; ?>
  <div class="row">
    <input type="submit" name="submit" value="Register">
  </div>
</form>
