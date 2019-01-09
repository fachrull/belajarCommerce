<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section class="page-header">
  <div class="container">

    <h1>AGMPEDIA</h1>

   

  </div>
</section>
<section>
  <div class="container">
    <div class="row">
      <?php 
  foreach ($pedia->result() as $row) {
      ?>
        <div class="py-5">
            <div class="container">
            <div class="row mb-5">
                <div class="col-md-7">
                <h2 class="text-primary"><?php echo $row->title; ?></h2>
                <p class=""><?php echo $row->content; ?></p>
                </div>
                <div class="col-md-5 align-self-center">
                <img class="img-fluid d-block w-100 img-thumbnail" src="<?php echo base_url('uploads'); ?>/<?php echo $row->photo; ?>"> </div>
            </div>
            </div>
        </div>
      <?php
  }
  ?>
    </div>
  </div>
</section>
