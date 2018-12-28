<?php defined('BASEPATH') or exit('No direct script access allow'); ?>

<div class="row">
  <div class="col-md-6 offset-md-3 col-sm-6 offset-sm-3">
    <!-- ALERT -->
    <?php if($this->session->has_userdata('error')): ?>
      <div class="alert alert-mini alert-danger mb-30">
        <strong>Oh snap!</strong> <?= $this->session->userdata('error');?>
      </div>
    <?php endif; ?>
    <!-- /ALERT -->
    <form class="m-0 sky-form boxed" action="<?= site_url('auth/login');?>" method="post">
      <header>
          <i class="fa fa-users"></i>Login
      </header>

      <fieldset class="m-0">
        <label class="input mb-10">
            <input name="uname" type="text" placeholder="Username">
        </label>
        <label class="input mb-10">
            <input name="password" type="password" placeholder="Password">
        </label>
        <label class="input mb-10">
          <a href="<?= site_url('auth/checkForgot');?>">Forgot password?</a>
        </label>
      </fieldset>
      <div class="row mb-20">
          <div class="col-md-6">
              <button type="submit" class="btn btn-oldblue"><i class="fa fa-check"></i>LOGIN</button>
          </div>
          <div class="col-md-6">
              <a href="<?= site_url('auth/regis');?>" class="btn btn-oldblue float-right" style="margin-right: 20px;">
                REGISTER
              </a>
          </div>
      </div>
    </form>
  </div>
</div>
