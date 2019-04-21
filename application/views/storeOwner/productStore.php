<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header">
        <h1>Product list</h1>
      </div>
      <div class="box-body">
          <div class="rows">
            <div class="col-xs-12">
              <?php if($products == NULL):?>
                  <p class="text-center">Tidak ada product yang di tambahkan.</p>
              <?php else:?>
              <table id="dataTable" class="table table-bordered table-striped">
            <thead>
              <th>No.</th>
              <th>Product</th>
              <th>Brand</th>
              <th>Category</th>
              <th>Size</th>
              <th>Quantity</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php $no=1; ?>
              <?php foreach($products as $product): ?>
                <tr>
                  <td><?= $no;?></td>
                  <td><?= $product['product_name'];?></td>
                  <td><?= $product['brand']?></td>
                  <td><?= $product['category']?></td>
                  <td><?= $product['size_name'].'('.$product['size_product'].')'?></td>
                  <td>
                    <div class="row">
                      <div class="col-sm-6">
                        <?= ($product['quantity'] != NULL? $product['quantity'] : '-')?>
                      </div>
                      <div class="col-sm-6">

                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="row">
                      <div class="col-sm-6">
                        <a href="<?= site_url('stores/addQuantity/'.$product['id_store'].'/'.$product['id_product'].'/'.$product['id_product_size']);?>" class="btn btn-oldblue"><i class="fa fa-plus"></i> Quantity</a>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php $no++; ?>
              <?php endforeach; ?>
              <?php endif;?>
            </tbody>
          </table>
            </div>
          </div>
          <div class="col-xs-12">
            <hr class="mt-80" style="width:100%; height:0px">
            <?php if ($special_packages == NULL): ?>
              <p class="text-center">Tidak ada Special Package yang di tambahkan.</p>
            <?php else: ?>
              <table id="dataTable1" class="table table-bordered table-striped">
                <thead>
                  <th>No.</th>
                  <th>Special Package Name</th>
                  <th>Quantity</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php $no = 1;foreach ($special_packages as $specialPackage): ?>
                    <tr>
                      <td><?= $no;?></td>
                      <td><?= $specialPackage['name']?></td>
                      <td>
                        <?= ($specialPackage['quantity'] != 0? $specialPackage['quantity'] : '-');?>
                      </td>
                      <td>
                        <div class="row">
                          <div class="col-sm-6 text-right">
                            <a href="<?= site_url('stores/addQuantity_SpecialPkg/'.$specialPackage['id_store'].'/'.$specialPackage['id_product'])?>" class="btn btn-oldblue"><i class="fa fa-plus"></i> Quantity</a>
                          </div>
                          <div class="col-sm-6">
                            <a href="<?= site_url('stores/detailSpecialPackage/'.$specialPackage['id_product'])?>" class="btn btn-success"><i class="fa fa-info"></i></a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php $no++;endforeach; ?>
                </tbody>
              </table>
            <?php endif; ?>
          </div>
      </div>
    </div>
  </section>
</div>
