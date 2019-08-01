<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content">
        <h1 class="text-center">ADD PRODUCT</h1>
        <div class="container-fluid">
            <div class="register-box mt-0" style="width: auto !important">
                <div class="register-box-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <!-- ALERT -->
                            <?php if($this->session->has_userdata('error')): ?>
                                <div class="alert alert-mini alert-danger mb-30">
                                    <strong>Oh snap!</strong>
                                    <?= $this->session->flashdata('error');?>
                                </div>
                            <?php elseif($this->input->post('items') == NULL): ?>
                                <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
                            <?php endif;?>
                            <!-- /ALERT -->
                            <?= form_open_multipart('admin/addProd', array('class' => 'm-0 sky-form', 'id' => 'addProd')); ?>
                            <!-- <p class="register-box-msg">Add a new product</p> -->
                            <div class="row mb-3">
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label><strong>Select Brand</strong></label>
                                        <select class="form-control" name="brand">
                                            <option value=""selected disabled>Brand</option>
                                            <?php foreach ($brands as $brand): ?>
                                                <option value="<?= $brand['id'];?>"><?= $brand['name'];?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label><strong>Select Category</strong></label>
                                        <select class="form-control" name="cat" id="cat">
                                            <option value=""selected disabled>Category</option>
                                            <?php foreach ($cats as $cat): ?>
                                                <option value="<?= $cat['id'];?>">
                                                    <?= $cat['name'];?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label><strong>Product Name</strong></label>
                                <input type="text" class="form-control" name="pName" placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <label><strong>SKU</strong></label>
                                <input type="text" class="form-control" id="sku" name="pSku" placeholder="SKU">
                            </div>
                            <div class="row mb-3">
                                <div class="col col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label><strong>Select Size</strong></label>
                                        <select class="form-control" id="size" name="size">
                                            <option value=""selected disabled>Size</option>
                                            <?php foreach($sizes as $size): ?>
                                                <option value="<?= $size['id'];?>">
                                                    <?=$size['name'];?> (<?=$size['size'];?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label for=""><strong>Price</strong></label>
                                        <input id="price" name="price" class="form-control" type="text" placeholder="Price (e.g 100000)">
                                    </div>
                                </div>
                                <div class="col col-md-12 col-xs-12 mb-20">
                                    <button type="button" id="sizePrice" class="btn btn-oldblue pull-right"><i class="fa fa-plus"></i>Add</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <table id="table_sizePrice" class="mb-10 table table-bordered table-striped">
                                        <thead>
                                        <th>SKU</th>
                                        <th>Size</th>
                                        <th>Price (Rp)</th>
                                        <th>Sub price</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mb-3 mt-10" id="spec-input">
                                <div class="col-md-12 col-xs-12 select2-input-field">
                                    <div class="form-group">
                                        <label><strong>Select a Spec</strong></label>
                                        <select class="form-control select2" id="spec" name="spec[]" multiple="multiple" data-placeholder="Select a spec"
                                                data-role="tagsinput" style="width: 100%;">
                                            <?php foreach ($specs as $spec): ?>
                                                <option value="<?=$spec['id']?>">
                                                    <?= $spec['name'];?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body pad pt-0 pl-0 pr-0">
                                <label><strong>Add Description</strong></label>
                                <textarea id="editor1" name="desc" rows="10" cols="80" placeholder="Description"></textarea>
                            </div>
                            <label class="input"><b>Upload product image</b>
                                <p class="help-block text-danger fs-12">Min. Size 2 MB and Resolution 700 x 670 pixels</p>
                                <input type="file" class="mt-5" name="productPict[]" />
                                <input type="file" class="mt-5" name="productPict[]" />
                                <input type="file" class="mt-5" name="productPict[]" />
                            </label>
                            <div class="row mt-10">
                                <div class="col-md-6 text-left">
                                    <a href="<?=site_url('admin/allProd')?>" class="btn btn-oldblue btn-default">Cancel</a>
                                    <!-- <button type="button" id="submit" name="button" class="btn btn-default">Test</button> -->
                                </div>
                                <div class="col-md-6 text-right">
                                    <button id="submit" type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i> Product</button>
                                    <!-- <button type="button" id="submit" name="button" class="btn btn-default">Test</button> -->
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
