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
          </div>
          <div class="box-body">
            <?php print_r($this->session->userdata()); ?>
            <form class="m-0 sky-form" action="<?= site_url('admin/storeProd/');?>" method="post">
              <fieldset>
                <label class="input mb-10">
                  <select class="custom-control-input" name="product">
                    <label class="input">
                      <option value="0" selected disabled>Product</option>
                      <label class="input">
                        <?php foreach ($products as $product): ?>
                          <option value="<?= $product['id'];?>"><?= $product['name'];?></option>
                        <?php endforeach; ?>
                      </label>
                    </label>
                  </select>
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
