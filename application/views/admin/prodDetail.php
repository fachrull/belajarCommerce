<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Detail Product
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
          <h2 class="mb-30">
            <?= $product['name']?>
            </h2>
          <div class="row">
            <div class="col-xs-6 mb-20">
            <img src="<?= base_url('asset/upload/'.$product['image']);?>" alt="<?= $product['name'];?>">
            </div>
            <div class="product-detail">
                <div class="col-xs-12 col-md-6 mb-20">
                  <div class="row">
                    <div class="col-xs-12 col-md-6">
                      <label class="input mb-10"> <p>Brand</p>
                        <input name="pName" type="text" value="<?=$brand['name'];?>" disabled>
                      </label>
                    </div>
                    <div class="col-xs-12 col-md-6">
                      <label class="input mb-10"> <p>Category</p>
                        <input name="pName" type="text" value="<?=$category['name'];?>" disabled>
                      </label>
                    </div>
                    <div class="col-xs-12">
                      <label class="input"> <p>Specification</p>
                        <ul class="mb-10">
                          <?php foreach($specs as $spec): ?>
                            <li><?= $spec['name'];?></li>
                          <?php endforeach;?>
                        </ul>
                      </label>
                    </div>
                    <div class="col-xs-12">
                    <label class="input"> <p>Size</p>
                      <ul>
                        <?php for($i = 0; $i < count($sizes); $i++): ?>
                          <li><?= $sizes[$i][0]['name'];?> (<?= $sizes[$i][0]['size'];?>) -
                            <b>Rp <?= number_format($prices[$i], 0, ",", ".");?></b></li>
                        <?php endfor; ?>
                      </ul>
                    </div>
                  </div>
                </div>
            <div class="col-xs-12">
              <label class="input mb-10"> <p>Description</p>
                <textarea name="" id="" cols="122" rows="10" readonly><?= $product['description'];?></textarea>
              </label>
            </div>
              </div>
            </div>
            <a href="<?= site_url('admin/editProd/'.$product['id'])?>" class="btn btn-oldblue btn-default" style="float:right;">Edit Product</a>
            <a href="<?= site_url('admin/allProd');?>"><button class="btn btn-oldblue btn-default">Back</button></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
