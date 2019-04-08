<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Incoming Subscriber
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                        </div>
                        <hr class="col-xs-12 mt-10">
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                            <th>No.</th>
                            <th>Email</th>
                            <th>Action</th>

                            </thead>
                            <tbody>
                            <?php $no = 1;foreach ($subscribers as $subscriber): ?>
                                <tr>
                                    <td><?= $no.'.';?></td>
                                    <td><?= $subscriber['email']?></td>

                                    <td>
                                        <a href="<?= site_url('admin/deletesubscriber/'.$subscriber['id']);?>"><i class="btn btn-danger fa fa-trash"></i></a>

                                    </td>
                                </tr>
                                <?php $no++; endforeach; ?>
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
