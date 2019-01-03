<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section class="page-header">
  <div class="container">

    <h1>Brad <?= $brand['name'];?></h1>

  </div>
</section>
<section>
    <div class="container">
      <div class="row">
        <form class="" action="<?= site_url();?>" method="post">
          <label class="select mb-10">
            <select class="custom-control-input" name="cat">
              <label class="input">
                <option value=""></option>
              </label>
            </select>
          </label>
        </form>
      </div>
    </div>
</section>
