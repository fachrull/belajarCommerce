<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

        <section class="page-header page-header-md">
            <div class="container">
				<div class="row">

					<!-- LEFT -->
					<div class="col-md-8 col-sm-8">
						<div class="card">
							<img class="img-fluid" src="<?= base_url('asset/upload/'.$promotion['image']);?>" alt="" />
							<div class="card-body">
								<h4>
									<?=$promotion['name']?>
								</h4>
								<?=$promotion['description']?>

							</div>
						</div>
					</div>

					<div class="col-md-4 col-sm-4">
						<div class="card promotion-card">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<p>Promotion Period</p>
									</div>
									<div class="col">
										<?php $start_date = date_create($promotion['start_date']);
										$end_date = date_create($promotion['end_date']);
										echo date_format($start_date, "d M Y"). " - ". date_format($end_date, "d M Y"); ?>
									</div>
								</div>
								<div class="row mt-10">
									<div class="col">
										<p>Voucher Code</p>
									</div>
									<div class="col">
										<p><?=$promotion['kode_voucher']?></p>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
<!--                <div class="row justify-content-center">-->
<!--                    <div class="col-md-10">-->
<!--                        <div class="line-height-30 text-center">-->
<!--							<h2>--><?//=$promotion['name'];?><!--</h2>-->
<!--							<figure class="mb-20">-->
<!--								<img class="img-fluid" src="--><?//= base_url('asset/upload/'.$promotion['image']);?><!--" alt="product name">-->
<!--							</figure>-->
<!--							--><?//=$promotion['description'];?>
<!--                        </div>-->
<!--                        <div class="col-md-4 offset-md-4 mt-30">-->
<!--                            <div class="card card-default text-center">-->
<!--								<div class="card-heading">-->
<!--									<h2 class="card-title fs-18">Promo Period</h2>-->
<!--								</div>-->
<!--								<div class="card-block fs-14">-->
<!--									--><?php
//									$start_date = date_create($promotion['start_date']);
//									$end_date = date_create($promotion['end_date']);
//									echo date_format($start_date, "d M Y"). " - ". date_format($end_date, "d M Y");
//									?>
<!--								</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
				<a href="<?= base_url('home/promotionPage');?>">
					<button class="btn btn-outline-secondary btn-oldblue mt-20">
						<i class="fa fa-arrow-left"></i>&nbsp All promotions
					</button>
				</a>
            </div>
        </section>

        <!-- / -->
