<?php defined('BASEPATH') or exit('No direct script access allow'); ?>

<?php if($this->session->has_userdata('error')): ?>
  <script>
    alert('<?= $this->session->userdata('error');?>');
  </script>
<?php endif; ?>

<form action="<?= site_url('index.php/auth/login');?>" method="post">

  <div class="row">
    <label for="uname">Username:</label>
    <input type="text" name="uname">
  </div>
  <div class="row">
    <label for="password">Password:</label>
    <input type="password" name="password">
  </div>
  <div class="row">
    <input type="submit" name="submit" value="Login">
    <a href="<?= site_url('auth/regis');?>" class="btn right">Register</a>
  </div>
</form>
