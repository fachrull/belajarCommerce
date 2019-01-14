<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Add store product
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs">
        <div class="box">
          <div class="box-header pb-0">
            <!-- ALERT -->
            <?php if($this->session->has_userdata('error')): ?>
              <div class="alert alert-mini alert-danger mb-30">
                <strong>Oh snap!</strong> <?= $this->session->userdata('error')?>
              </div>
            <?php endif; ?>
            <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
            <!-- /ALERT -->
          </div>
          <div class="box-body">
            <form class="m-0 sky-form" action="#" method="post">
              <fieldset>
                <?php print_r($quantity); ?>
                <?php print_r($this->session->userdata()); ?>
                <p>Quantity: <?= $quantity['quantity'];?></p>
                <label class="input mb-10">
                  <input type="text" name="quan" placeholder="Quantity">
                </label>
                <div class="row mb-20">
                  <button type="submit" class="btn btn-oldblue btn-default">Set</button>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
