<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
  <div class="col-md-6 offset-md-3 col-sm-6 offset-sm-3">
    <!-- ALERT -->
    <?php if($this->session->flashdata('wrongUnameOrPass')): ?>
      <div class="alert alert-mini alert-danger mb-30">
        <strong>Oh snap!</strong> <?= $this->session->flashdata('wrongUnameOrPass');?>
      </div>
    <?php endif; ?>
    <!-- /ALERT -->
    <form class="m-0 sky-form boxed" action="<?= site_url('auth/checkForgot');?>" method="post">
      <header>
          <i class="fa fa-users"></i>Forgot Pass
      </header>
      <fieldset class="m-0">
            <label class="input mb-10">
              <input name="search" type="text" placeholder="Email or Username">
            </label>
        <?php if($this->session->flashdata('updatePass') == TRUE): ?>
            <label class="input mb-10">
              <input name="pass" type="password" placeholder="New Password">
            </label>
          <?php endif; ?>
      </fieldset>
      <div class="row mb-20">
          <div class="col-md-12">
              <button type="submit" class="btn btn-oldblue"><i class="fa fa-check"></i>LOGIN</button>
          </div>
      </div>
    </form>
  </div>
</div>
