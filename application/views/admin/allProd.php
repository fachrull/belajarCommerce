<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Products
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <a href="<?= site_url('admin/addProd');?>" class="mb-10 btn btn-oldblue "><i class="fa fa-plus"></i> Add Product</a>
              </div>
              <div class="col-sm-6">
                <form action="<?= site_url('admin/allProd')?>" method="post" class="m-0">
                  <div class="row">
                    <div class="col-sm-4 mb-10">
                      <label class="input m-0 form-all-product">
                        <select class="form-control" name="brand" style="height:30px !important;">
                          <option value="0" selected>Brand</option>
                          <?php foreach($brands as $brand): ?>
                            <option value="<?= $brand['id']?>"><?= $brand['name'];?></option>
                          <?php endforeach; ?>
                        </select>
                      </label>
                    </div>
                    <div class="col-sm-5 mb-10">
                      <label class="input m-0 form-all-product">
                        <select class="form-control"  name="cat" style="height:30px !important;">
                          <option value="0" selected>Category</option>
                          <?php foreach($cats as $cat): ?>
                            <option value="<?= $cat['id'];?>"><?= $cat['name']?></option>
                          <?php endforeach; ?>
                        </select>
                      </label>
                    </div>
                    <div class="col-sm-3 mb-10">
                      <button type="submit" name="submit" class="btn btn-oldblue  form-all-product">
                        <i class="fa fa-search"></i> Search
                      </button>
                    </div>
                    </div>
                </form>
              </div>
            </div>
            <hr class="col-xs-12 mt-10">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <th>No</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Product</th>
                <th>Stars</th>
                <th>Action</th>
              </thead>
              <tbody>
                <?php $no=1; ?>
                <?php if($products != NULL) {foreach ($products as $product): ?>
                  <tr>
                    <td><?=$no;?></td>
                      <td><?=$product['brand_name'];?></td>
                      <td><?=$product['cat_name'];?></td>
                    <td><?= $product['product'];?></td>
                    <td>
                      <?php if ($product['stars'] == 0): ?>
                        <p><?= $product['stars']?></p>
                      <?php else: ?>
                        <?php ;for($i = 0; $i < $product['stars']; $i++): ?>
                          <span class="glyphicon glyphicon-star"></span>
                        <?php endfor; ?>
                      <?php endif; ?>
                    </td>
                    <td>
                      <a href="<?= site_url('admin/detailProd/'.$product['id']);?>"><i class="btn btn-oldblue fa fa-info"></i></a>
                      <a href="<?= site_url('admin/deleteProd/'.$product['id']);?>" onclick="return confirm('Are you sure?')"><i class="btn btn-danger fa fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php $no++; ?>
                <?php endforeach;} ?>
              </tbody>
            </table>
            <div class="row pb-10">
                <div class="col-xs-12">
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
