<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- OWL CAROUSEL -->
<div class="text-center">
  <div class="header-carousel">
    <div class="owl-carousel m-0 owl-stage-outer" id="owl-header" data-plugin-options='{"autoPlay": 3000}'>
      <div>
        <span>
          <img class="img-fluid" src="<?= base_url('asset/content-images/background-header.jpeg');?>" alt="!#">
        </span>
        <h2 class="owl-carousel-caption center text owl-caption-text-dark owl-featured">LOREM IPSUM</h2>
        <button><a class="page-scroll absolute letter-spacing-1 text-white" href="<?= site_url('#product');?>">EXPLORE<br><i class="fa fa-chevron-down"></i></a></button>
      </div>
      <div>
        <span>
          <img class="img-fluid" src="<?= base_url('asset/content-images/background-header.jpeg');?>" alt="!#">
        </span>
        <h2 class="owl-carousel-caption center text owl-caption-text-dark owl-featured">LOREM IPSUM</h2>
        <button><a class="page-scroll absolute letter-spacing-1 text-white" href="<?= site_url('#product');?>">EXPLORE<br><i class="fa fa-chevron-down"></i></a></button>
      </div>
      <div>
        <span>
          <img class="img-fluid" src="<?= base_url('asset/content-images/background-header.jpeg');?>" alt="!#">
        </span>
        <h2 class="owl-carousel-caption center text owl-caption-text-dark owl-featured">LOREM IPSUM</h2>
        <button><a class="page-scroll absolute letter-spacing-1 text-white" href="<?= site_url('#product');?>">EXPLORE<br><i class="fa fa-chevron-down"></i></a></button>
      </div>
      <div>
        <span>
          <img class="img-fluid" src="<?= base_url('asset/content-images/background-header.jpeg');?>" alt="!#">
        </span>
        <h2 class="owl-carousel-caption center text owl-caption-text-dark owl-featured">LOREM IPSUM</h2>
        <button><a class="page-scroll absolute letter-spacing-1 text-white" href="<?= site_url('#product');?>">EXPLORE<br><i class="fa fa-chevron-down"></i></a></button>
      </div>
      <div>
        <span>
          <img class="img-fluid" src="<?= base_url('asset/content-images/background-header.jpeg');?>" alt="!#">
        </span>
        <h2 class="owl-carousel-caption center text owl-caption-text-dark owl-featured">LOREM IPSUM</h2>
        <button><a class="page-scroll absolute letter-spacing-1 text-white" href="<?= site_url('#product');?>">EXPLORE<br><i class="fa fa-chevron-down"></i></a></button>
      </div>
    </div>
  </div>
</div>
<!-- /OWL CAROUSEL -->

<!-- PRODUCT -->
<section id="product" class="section-xs container pt-100">
  <div class="row text-center">
    <div class="col-6 col-md-2 offset-md-3 pb-70">
      <a href="shop.html">
        <img alt="Aireloom" src="<?= base_url('asset/brands/brand-aireloom-blue.svg');?>" />
      </a>
    </div>
    <div class="col-6 col-md-2 pb-70">
      <a href="shop.html">
        <img alt="King Koil" src="<?= base_url('asset/brands/brand-kingkoil-blue.svg');?>" />
      </a>
    </div>
    <div class="col-6 col-md-2 pb-70">
      <a href="shop.html">
        <img alt="Florence" src="<?= base_url('asset/brands/brand-florence-blue.svg');?>" />
      </a>
    </div>
    <div class="col-6 col-md-2 offset-md-3 pb-70">
      <a href="shop.html">
        <img alt="Serta" src="<?= base_url('asset/brands/brand-serta-blue.svg');?>" />
      </a>
    </div>
    <div class="col-6 col-md-2 pb-70">
      <a href="shop.html">
        <img alt="Tempur" src="<?= base_url('asset/brands/brand-tempur-blue.svg');?>" />
      </a>
    </div>
    <div class="col-6 col-md-2 pb-70">
      <a href="shop.html">
        <img alt="Stressless" src="<?= base_url('asset/brands/brand-stressless-blue.svg');?>" />
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-12 text-center">
      <button class="brand-button">
        N E W S L E T T E R
      </button>
      <a class="page-scroll" href="<?= site_url('#agmpedia');?>">
        <p>View Detail &nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></p>
      </a>

    </div>
  </div>
</section>
<!-- /PRODUCT -->

<!-- PROMOTION -->
<section id="promotion" class="section-xs container">
  <div class="row">
    <div class="col-12 col-md-4 pt-30">
      <img class="promotion-image-1" src="<?= base_url('asset/content-images/slider-1-100x100.png');?>" alt="agm best seller" />
      <div class="absolute pl-20 pb-20 bottom-center text-left">
        <h2 class="hidden-sm hidden-xs-down text-white">BEST<br>SELLER</h2>
        <a class="mt-10" href="promotion-page.html">View Detail<i class="fa fa-long-arrow-right pl-5" aria-hidden="true"></i></a>
      </div>
    </div>

    <div class="col-12 col-md-8">
      <div class="row">
        <div class="col-md-12 pt-30">
          <div class="relative">
            <img class="promotion-image-2" src="<?= base_url('asset/content-images/slider-1-100x100.png');?>" alt="agm gallery" />
            <div class="absolute pl-20 pb-20 bottom-center text-left">
              <h2 class="hidden-sm hidden-xs-down text-white">AGM<br>GALLERY</h2>
              <a href="promotion-page.html">View Detail<i class="fa fa-long-arrow-right pl-5" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-6 pt-30">
          <img class="promotion-image-3" src="<?= base_url('asset/content-images/slider-1-100x100.png');?>" alt="promotion" />
        </div>
        <div class="col-md-6 pt-30">
          <img class="promotion-image-3" src="<?= base_url('asset/content-images/slider-1-100x100.png');?>" alt="agm lastest collectin" />
          <div class="absolute pl-20 pb-20 bottom-center text-left">
            <h2 class="hidden-sm hidden-xs-down text-white">LASTEST<br>COLLECTION</h2>
            <a href="promotion-page.html">View Detail<i class="fa fa-long-arrow-right pl-5" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /PROMOTION -->

<?php print_r($pedias); ?>

<!-- AGMPEDIA -->
<section id="agmpedia" class="section-xs container">
  <a href="list-article.html">
    <h3 class="text-center">AGMPEDIA</h3>
    <h5 class="text-center">lastest news of week</h5>
  </a>
  <div class="row">
    <div class="col-12 col-md-7 order-2 order-md-1">
      <img class="pedia-img-1" src="<?= base_url('asset/content-images/slider-1-100x100.png');?>" alt="agmpedia">
    </div>
    <div class="col-12 col-md-5 pb-30 order-1 order-md-2">
      <div class="owl-carousel buttons-autohide controlls-over mb-30" data-plugin-options='{"singleItem": true, "navigation": false, "autoPlay": 3000, "pagination": false, "transitionStyle":"fade"}'>
        <div>
          <img class="pedia-img-2" src="<?= base_url('asset/content-images/slider-1.jpg');?>" alt="agmpedia title">
          <div class="absolute pt-20">
            <h4 class="text-white text-center">LOREM 1</h4>
            <h6 class="text-white text-center">CONSECTUR ADIPISCING ELIT</h6>
            <p class="fs-10 text-white text-justify pedia-text hidden-xs-down hidden-md-down just-hidden">

            </p>
            <p class="text-center to-center fs-12 pt-20"><a class="text-white" href="full-article.html">read more<i class="fa fa-chevron-right pl-5"
                 aria-hidden="true"></i></a></p>
          </div>
        </div>
        <div>
          <img class="pedia-img-2" src="<?= base_url('asset/content-images/slider-1.jpg');?>" alt="agmpedia title">
          <div class="absolute pt-20">
            <h4 class="text-white text-center">LOREM 2</h4>
            <h6 class="text-white text-center">CONSECTUR ADIPISCING ELIT</h6>
            <p class="fs-10 text-white text-justify pedia-text hidden-xs-down hidden-md-down just-hidden">Lorem ipsum dolor
              sit
              amet
              consectetur
              adipisicing elit.
              Explicabo
              cum
              reprehenderit
              unde
              maxime
              ducimus est
            </p>
            <p class="text-center to-center fs-12 pt-20"><a class="text-white" href="full-article.html">read more<i class="fa fa-chevron-right pl-5"
                 aria-hidden="true"></i></a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-5 pb-5">
      <div class="owl-carousel buttons-autohide controlls-over mb-30" data-plugin-options='{"singleItem": true, "navigation": false, "autoPlay": 3000, "pagination": false, "transitionStyle":"fade"}'>
        <div>
          <img class="pedia-img-2" src="<?= base_url('asset/content-images/slider-1.jpg');?>" alt="agmpedia title">
          <div class="absolute pt-20">
            <h4 class="text-white text-center">LOREM 1</h4>
            <h6 class="text-white text-center">CONSECTUR ADIPISCING ELIT</h6>
            <p class="fs-10 text-white text-justify pedia-text hidden-xs-down hidden-md-down just-hidden">Lorem ipsum dolor
              sit
              amet
              consectetur
              adipisicing elit.
              Explicabo
              cum
              reprehenderit
              unde
              maxime
              ducimus est
            </p>
            <p class="text-center to-center fs-12 pt-20"><a class="text-white" href="full-article.html">read more<i class="fa fa-chevron-right pl-5"
                 aria-hidden="true"></i></a></p>
          </div>
        </div>
        <div>
          <img class="pedia-img-2" src="<?= base_url('asset/content-images/slider-1.jpg');?>" alt="agmpedia title">
          <div class="absolute pt-20">
            <h4 class="text-white text-center">LOREM 2</h4>
            <h6 class="text-white text-center">CONSECTUR ADIPISCING ELIT</h6>
            <p class="fs-10 text-white text-justify pedia-text hidden-xs-down hidden-md-down just-hidden">Lorem ipsum dolor
              sit
              amet
              consectetur
              adipisicing elit.
              Explicabo
              cum
              reprehenderit
              unde
              maxime
              ducimus est
            </p>
            <p class="text-center to-center fs-12 pt-20"><a class="text-white" href="full-article.html">read more<i class="fa fa-chevron-right pl-5"
                 aria-hidden="true"></i></a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-7 pb-5">
      <img class="pedia-img-1" src="<?= base_url('asset/content-images/slider-2-100x100.png');?>" alt="agmpedia">
    </div>
  </div>
</section>
<!-- /AGMPEDIA -->

<!-- LOCATION -->
<section id="location" class="section-xs container">
  <h3 class="text-center pb-30">OUR LOCATION</h3>
  <div class="row">
    <div class="col-12 col-md-6 pb-30">
      <img class="img-fluid" src="<?= base_url('asset/content-images/slider-2-100x100.png');?>" alt="!#">
      <div class="absolute pt-20">
        <h3 class="text-white text-center">LISTS THE STORES</h3>
      </div>
    </div>
    <div class="col-12 col-md-6 pb-30">
      <img class="img-fluid" src="<?= base_url('asset/content-images/slider-1-100x100.png');?>" alt="!#">
      <div class="absolute pt-20">
        <h3 class="text-white text-center">MAP</h3>
      </div>
    </div>
  </div>
</section>
<!-- /LOCATION -->
