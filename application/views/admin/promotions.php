<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Promotions</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <?php if ($this->session->userdata('uType') == 1): ?>
                              <div class="col-md-12">
                                  <a href="<?= site_url('admin/addPromotion');?>" class="mb-10 btn btn-oldblue"><i class="fa fa-plus"></i>Promotion</a>
                              </div>
                            <?php endif; ?>
                        </div>
                        <hr class=col-xs-12>
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Period</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            <?php $no=1; ?>
                            <?php foreach($promotion as $promotion): ?>
                                <tr>
                                    <td><?= $no;?></td>
                                    <td><?= $promotion['name'];?></td>
                                    <td><?= $promotion['start_date']." - ". $promotion['end_date']?></td>
                                    <td>
                                        <a href="<?= site_url('admin/detailpromotion/'.$promotion['id'])?>"><i class="btn btn-oldblue fa fa-info"></i></a>
                                        <?php if ($this->session->userdata('uType') == 1): ?>
                                          <a href="<?= site_url('admin/deletePromotion/'.$promotion['id'])?>" onclick="return confirm('Are you sure?')"><i class="btn btn-danger fa fa-trash"></i></a>
                                        <?php endif; ?>
                                        <a href="<?=site_url('admin/activePromotion/'.$promotion['id']);?>"><i  class="btn <?php echo $promotion['status'] == 1? 'btn-success': 'btn-danger'; ?> fa fa-power-off "></i></a>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
