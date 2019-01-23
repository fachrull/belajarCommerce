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
          <h2>
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
                        <input name="pName" type="text" value="<?=$cat['name'];?>" disabled>
                      </label>
                    </div>
                    <div class="col-xs-12 col-md-6">
                      <label class="input mb-10"> <p>Price</p>
                        <input name="pName" type="text" value="Rp. <?= $product['price'];?>" disabled>
                      </label>
                    </div>
                    <div class="col-xs-12 col-md-6">
                      <label class="input mb-10"> <p>Sub Price</p>
                        <input name="pName" type="text" value="Rp. <?=$product['sub_price'];?>" disabled>
                      </label>
                    </div>
                    <div class="col-xs-12">
                    <form action="" class="mb-0">
                      <label class="input"> <p>Specification</p>
                        <div class="row">
                          <div class="col-xs-8 col-md-8">
                            <select class="form-control" name="spec">
                              <option selected disabled>Specification</option>
                            <?php foreach($specs as $spec): ?>
                              <option value="<?= $spec['id'];?>"><?= $spec['name'];?></option>
                            <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="col-xs-4 col-md-4">
                            <button type="submit" class="btn btn-oldblue btn-default" style="width:130px"><i class="fa fa-plus"></i> Specification</button>
                          </div>
                        </div>
                      </label>
                    </form>
                    <ul class="mb-10">
                      <?php foreach($specProds as $specProd) :?>
                        <li><?= $specProd['name'];?></li>
                      <?php endforeach;?>
                    </ul>
                    </div>
                    <div class="col-xs-12">
                    <form action="" class="mb-0">
                    <label class="input"> <p>Size</p>
                      <div class="row">
                        <div class="col-xs-8">
                          <select class="form-control" name="size">
                            <option selected disabled>Size</option>
                          <?php foreach($sizes as $size): ?>
                            <option value="<?= $size['id'];?>"><?=$size['name'];?> (<?=$size['size'];?>)</option>
                          <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="col-xs-4">
                            <button type="submit" class="btn btn-oldblue btn-default" style="width:130px"><i class="fa fa-plus"></i> Size</button>
                          </div>
                        </div>
                      </label>
                    </form>
                    <ul class="mb-10">
                      <?php foreach($sizeProds as $sizeProd): ?>
                        <li><?= $sizeProd['name'];?></li>
                      <?php endforeach;?>
                    </ul>
                    </div>
                  </div>
                </div>
            <div class="col-xs-12">
              <label class="input mb-10"> <p>Description</p>
                <textarea disabled><?= $product['description'];?></textarea>
              </label>
            </div>
              </div>
            </div>
            <button type="submit" class="btn btn-oldblue btn-default" style="float:right;">Edit Product</button>
            <a href="<?= site_url('admin/allProd');?>"><button class="btn btn-oldblue btn-default">Back</button></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
