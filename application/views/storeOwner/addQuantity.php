<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
  <h1 class="text-center">ADD Stock <?= $product['name'];?></h1>
    <div class="container-fluid">
      <div class="register-box mt-0">
        <div class="register-box-body">
          <div class="row">
            <div class="col-md-12 col-sm-6">
              <!-- ALERT -->
              <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
              <!-- /ALERT -->
              <form class="m-0 sky-form" action="<?= site_url('stores/addQuantity/'.$id['idStore'].'/'.$id['idProd'].'/'.$id['idProdSize']);?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
              <label><strong>Inbound</strong></label>
                <label class="input mb-10">
                  <input class="form-control" name="ibound" type="number"  min="0" value="<?= $quantity['inbound']?>" placeholder="Quantity">
                </label>
                <div class="row">
                  <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i>ADD</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
