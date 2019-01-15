<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Products
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs">
        <div class="box">
          <div class="box-header pb-0">
            <form action="<?= site_url('admin/allProd')?>" method="post">
              <div class="row">
                <div class="col-sm-4">
                  <label class="input mb-10" style="width:100%;">
                    <select class="form-control" name="brand">
                      <option value="0" selected>Brand</option>
                      <?php foreach($brands as $brand): ?>
                        <option value="<?= $brand['id']?>"><?= $brand['name'];?></option>
                      <?php endforeach; ?>
                    </select>
                  </label>
                </div>
                <div class="col-sm-4">
                  <label class="input mb-10" style="width:100%;">
                    <select class="form-control"  name="cat">
                      <option value="0" selected>Category</option>
                      <?php foreach($cats as $cat): ?>
                        <option value="<?= $cat['id'];?>"><?= $cat['name']?></option>
                      <?php endforeach; ?>
                    </select>
                  </label>
                </div>
                <div class="col-sm-4">
                  <button type="submit" name="submit" class="btn btn-oldblue">
                    <i class="fa fa-search"></i> Search
                  </button>
                </div>
                </div>
            </form>
            </div>
          <div class="box-body">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <th>No</th>
                <th>Product</th>
                <th>Price</th>
                <th>Sub Price</th>
                <th>Detail</th>
                <th>Delete</th>
              </thead>
              <tbody>
                <?php $no=1; ?>
                <?php foreach ($products as $product): ?>
                  <tr>
                    <td><?=$no;?></td>
                    <td><?= $product['name'];?></td>
                    <td><?= $product['price'];?></td>
                    <td><?= $product['sub_price'];?></td>
                    <td>
                      <a href="<?= site_url('admin/detailProd/'.$product['id']);?>" class="btn btn-oldblue"><i class="fa fa-info"></i></a>
                    </td>
                    <td>
                      <a href="<?= site_url('admin/deleteProd/'.$product['id']);?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php $no++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
            <div class="row">
              <div class="col-md-12">
                <a href="<?= site_url('admin/addProd');?>" class="btn btn-oldblue"><i class="fa fa-plus"></i> Add Product</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
