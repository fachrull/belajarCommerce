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
                    <h2 class="mt-0">
                    Lorem ipsum
                    </h2>
                    <img src="<?= base_url('asset/upload/2.jpg')?>" alt="">
                    <div class="row mt-20">
                        <div class="col-xs-6">
                            <div class="box-header pb-0">
                                <h3 class="box-title">Package</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered text-center">
                                    <tbody class="text-center">
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Product</th>
                                        <th>Image</th>
                                    </tr>
                                    <tr>
                                        <td>1.</td>
                                        <td>Spine-X</td>
                                        <td>
                                        <img style="height:50px;width:auto !important;" src="<?= base_url('asset/upload/2.jpg')?>" alt="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Imperial Heritage</td>
                                        <td>
                                        <img style="height:50px;width:auto !important;" src="<?= base_url('asset/upload/2.jpg')?>" alt="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Imperial Heritage</td>
                                        <td>
                                        <img style="height:50px;width:auto !important;" src="<?= base_url('asset/upload/2.jpg')?>" alt="">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div>
                                <h4>Price</h4>
                                <p class="fs-15"><strong>Rp 12.000.000</strong></p>
                            </div>
                            <div class="mt-20">
                                <h4>Description</h4>
                                <textarea name="" id="" cols="65" rows="10" readonly></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-20">
                        <button type="submit" class="btn btn-oldblue btn-default" style="float:right;">Edit Product</button>
                        <a href="<?= site_url('admin/allProd');?>"><button class="btn btn-oldblue btn-default">Back</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
</div>
