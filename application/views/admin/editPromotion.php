<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content">
        <h1 class="text-center">EDIT PROMOTION</h1>
        <div class="container-fluid">
            <div class="register-box mt-0" style="width: auto !important">
                <div class="register-box-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <!-- ALERT -->
                            <?php if ($this->session->has_userdata('error')): ?>
                                <div class="alert alert-mini alert-danger mb-30">
                                    <strong>Oh snap!</strong> <?= $this->session->flashdata('error'); ?>
                                </div>
                            <?php elseif ($this->input->post('items') == NULL): ?>
                                <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>'); ?>
                            <?php endif; ?>
                            <!-- /ALERT -->
                            <?= form_open_multipart('admin/editpromotion/'.$promotion['id'], array('class' => 'm-0 sky-form', 'id' => 'addProd')); ?>
                            <label>
                                <div class="input-group date">
                                    <input placeholder="Promotion Name" name="name" type="text" value="<?=$promotion['name']?>" class="form-control pull-right">
                                </div>
                            </label>
                            <label>
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input placeholder="Start Period" name="start" value="<?=$promotion['start_date']?>" type="text" class="form-control pull-right datepicker" id="datepicker">
                            </div>
                            </label>
                            <!-- /.input group -->
                            <label>
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input placeholder="End Period" name="end" type="text" value="<?=$promotion['end_date']?> "class="form-control pull-right datepicker" id="enddatepicker">
                            </div>
                            </label>
                            <div class="box-body pad pt-10 pl-0 pr-0 mb-10">
                                <textarea id="desc" name="desc" rows="10" cols="80"
                                          placeholder="Description"><?=$promotion['description']?></textarea>
                            </div>
                            <label class="input mb-10"><b>Upload promotion image</b>
                                <p class="help-block text-danger fs-12">Max. Size 2 MB and Resolution 700 x 670 pixels</p>
                                <input type="file" class="mt-5" name="promotionImage" />
                            </label>
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <a href="<?=site_url('admin/promotions');?>" id="submit" type="submit" class="btn btn-oldblue btn-default">Cancel
                                    </a>
                                    <!-- <button type="button" id="submit" name="button" class="btn btn-default">Test</button> -->
                                </div>
                                <div class="col-md-6 text-right">
                                    <button id="submit" type="submit" class="btn btn-oldblue btn-default">Submit
                                    </button>
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
