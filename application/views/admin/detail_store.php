<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= $post['company_name'];?>
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header pb-0">
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th>Email</th>
                  <td><?= $prime[0]['email'];?></td>
                </tr>
                <tr>
                  <th>Address</th>
                  <td class="word-wrap"><?= $post['address'];?></td>
                </tr>
                <tr>
                  <th>Address 2</th>
                  <td class="word-wrap"><?php echo ($post['address2'] == NULL? "-" : $post['address2']); ?></td>
                </tr>
                <tr>
                  <th>Province</th>
                  <td><?= $post['province'];?></td>
                </tr>
                <tr>
                  <th>City</th>
                  <td><?= $post['city'];?></td>
                </tr>
                <tr>
                  <th>Sub district</th>
                  <td><?= $post['sub_district'];?></td>
                </tr>
                <tr>
                  <th>Postcode</th>
                  <td><?= $post['postcode'];?></td>
                </tr>
                <tr>
                  <th>Phone 1</th>
                  <td><?php echo ($post['phone1'] == NULL? "-" : $post['phone1']);?></td>
                </tr>
                <tr>
                  <th>Fax</th>
                  <td><?php echo ($post['fax'] == NULL? "-" : $post['fax']);?></td>
                </tr>
              </table>
            </div>
          </div>
          <div class="box-body">
            <hr>
          <a href="<?= site_url('admin/addCluster/'.$post['id'])?>"><button class="btn btn-default btn-oldblue pull-right"><i class="fa fa-plus"></i> Add Cluster</button></a>
          <hr class="mt-80" style="width:100%; height:0px">
          <table id="dataTable1" class="table table-bordered table-striped">
              <thead>
                <th>No.</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Action</th>
              </thead>
              <tbody>
                    <?php $no = 1;foreach ($clusters as $cluster): ?>
                      <tr>
                        <td><?= $no.'.'?></td>
                        <td><?= $cluster['prov_name']?></td>
                        <td><?= $cluster['city_name']?></td>
                        <td><?= $cluster['sub_name']?></td>
                        <td>
                          <a href="<?= site_url('admin/deleteCluster_Store/'.$post['id'].'/'.$cluster['sub_district'])?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            <i class="fa fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php $no++;endforeach; ?>
              </tbody>
            </table>
            <hr>
            <a href="<?= site_url('admin/storeProd/'.$post['id']);?>"><button class="btn btn-default btn-oldblue pull-right"><i class="fa fa-plus"></i> Add Product</button></a>
            <hr class="mt-80" style="width:100%; height:0px">
                <table id="dataTable" class="table table-bordered table-striped">
                  <thead>
                    <th>No.</th>
                    <th>Product</th>
                    <th id="sizeProduct">Size</th>
                    <th>Quantity</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <?php if(is_array($products)): ?>
                      <?php $no=1; ?>
                      <?php foreach($products as $product): ?>
                        <tr>
                          <td><?= $no;?></td>
                          <td><?= $product['product_name'];?></td>
                          <td><?=$product['size_name'];?> (<?= $product['size']; ?>)</td>
                          <td><?= ($product['quantity'] != NULL? $product['quantity']:'-');?></td>
                          <td>
                            <a href="" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php $no++; ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
                <hr>
                <a href="<?= site_url('admin/addStore_SpecialPackage/'.$post['id'])?>"><button class="btn btn-default btn-oldblue pull-right"><i class="fa fa-plus"></i> Add Special Package</button></a>
                <hr class="mt-80" style="width:100%; height:0px;">
                <table id="tableStoreSpecialPackage" class="table table-bordered table-striped">
                  <thead>
                    <th>No.</th>
                    <th>Special Package</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <?php if (is_array($special_packages)): ?>
                      <?php $no=1; foreach ($special_packages as $specialPackage): ?>
                        <tr>
                          <td><?= $no?></td>
                          <td><?= $specialPackage['name']?></td>
                          <td><?= $specialPackage['quantity']?></td>
                          <td><?= 'Rp. '.number_format($specialPackage['price'],0,',','.')?></td>
                          <td>
                            <a href="#" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                      <?php $no++; endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
