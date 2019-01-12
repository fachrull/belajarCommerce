<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Add
      <small>Product</small>
    </h1>
  </section>
  <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-11 offset-md-3 col-sm-6 offset-sm-3">
            <!-- ALERT -->
            <?php if($this->session->has_userdata('error')): ?>
              <div class="alert alert-mini alert-danger mb-30">
                <strong>Oh snap!</strong> <?= $this->session->flashdata('error');?>
              </div>
            <?php elseif($this->input->post('items') == NULL): ?>
              <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
            <?php endif;?>
            <!-- /ALERT -->
            <?= form_open_multipart('admin/addProd', array('class' => 'm-0 sky-form boxed')); ?>
            <header>
                <i class="fa fa-plus"></i> Add Product
            </header>
            <fieldset>
              <div class="row mb-3">
                  <div class="col-md-6">
                      <label class="input">
                          <select class="form-control" name="brand">
                            <option selected disabled>Select Brand</option>
                            <?php foreach ($brands as $brand): ?>
                              <option value="<?= $brand['id'];?>"><?= $brand['name'];?></option>
                            <?php endforeach; ?>
                          </select>
                      </label>
                  </div>
                  <div class="col col-md-6">
                      <label class="input">
                          <select class="form-control" name="cat">
                            <option selected disabled>Select Category</option>
                            <?php foreach ($cats as $cat): ?>
                              <option value="<?= $cat['id'];?>"><?= $cat['name'];?></option>
                            <?php endforeach; ?>
                          </select>
                      </label>
                  </div>
              </div>
              <label class="input mb-10">
                  <input name="pName" type="text" placeholder="Product Name">
              </label>
              <div class="row mb-3">
                  <div class="col-md-6">
                      <label class="input">
                          <input name="price" type="text" placeholder="Price">
                      </label>
                  </div>
                  <div class="col col-md-6">
                      <label class="input">
                          <input name="sPrice" type="text" placeholder="Sub Price">
                      </label>
                  </div>
              </div>
              <label class="input mb-10">
                  <input name="quantity" type="text" placeholder="Quantity">
              </label>
              <label class="input mb-10">
                <textarea name="desc" rows="8" cols="141" placeholder="Description"></textarea>
              </label>
              <label class="input mb-10">
                <input type="text" name="comfort" placeholder="Comfort Level">
              </label>
              <label class="input mb-10">
                <input type="text" name="tickness" placeholder="Mattress Tickness">
              </label>
              <div class="row mb-3">
                  <div class="col-md-6">
                      <label class="input">
                          <input name="ht" type="text" placeholder="Headboard Type">
                      </label>
                  </div>
                  <div class="col col-md-6">
                      <label class="input">
                          <input name="ft" type="text" placeholder="Foundation Type">
                      </label>
                  </div>
              </div>
              <label class="input mb-10">
                <input type="text" name="size" placeholder="E.g. 160x200, 180x200">
              </label>
              <label class="input mb-10">
                <input type="file" name="productPict" />
              </label>
            </fieldset>
            <div class="row mb-20">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i> Product</button>
                </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </section>
</div>
