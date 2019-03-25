<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

        <section class="page-header page-header-md">

            <div class="container">

                <h1>PROMOTION DETAIL</h1>

                <!-- breadcrumbs -->
                <!--<ol class="breadcrumb">-->
                <!--    <li><a href="#">Home</a></li>-->
                <!--    <li><a href="#">Pages</a></li>-->
                <!--    <li class="active">Frequently Asked Questions</li>-->
                <!--</ol>-->
                <!-- /breadcrumbs -->

            </div>
        </section>
        <!-- /PAGE HEADER -->

        <!-- -->
        <section class="page-header page-header-md">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="line-height-30 text-center">
                            <h2><?=$promotion['name'];?></h2>
                            <figure class="mb-20">
                                <img class="img-fluid" src="<?= base_url('asset/upload/'.$promotion['image']);?>" alt="product name">
                            </figure>
                            <?=$promotion['description'];?>
                        </div>
                        <div class="col-md-4 offset-md-4 mt-30">
                            <div class="card card-default text-center">
                                <div class="card-heading">
                                    <h2 class="card-title fs-18">Promo Period</h2>
                                </div>
                                <div class="card-block fs-14">
                                    <?php
                                    $start_date = date_create($promotion['start_date']);
                                    $end_date = date_create($promotion['end_date']);
                                    echo date_format($start_date, "d M Y"). " - ". date_format($end_date, "d M Y");
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<a href="<?= base_url('home/promotionPage');?>"><button class="btn btn-outline-secondary btn-oldblue mt-20">
<i class="fa fa-arrow-left"></i>&nbsp Back
</button></a>
            </div>
        </section>

        <!-- / -->

     