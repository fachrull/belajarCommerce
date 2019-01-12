<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- RIGHT -->
<div class="col-md-9 col-sm-9">

  <h1 class="blog-post-title"><?= $pedia['title'];?></h1>
  <ul class="blog-post-info list-inline">
    <li>
      <a href="#">
        <i class="fa fa-clock-o"></i>
        <span class="font-lato"><?= $pedia['date'];?></span>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-comment-o"></i>
        <span class="font-lato">28 Comments</span>
      </a>
    </li>
    <li>
      <i class="fa fa-folder-open-o"></i>

      <a class="category" href="#">
        <span class="font-lato">Design</span>
      </a>
      <a class="category" href="#">
        <span class="font-lato">Photography</span>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-user"></i>
        <span class="font-lato">John Doe</span>
      </a>
    </li>
  </ul>

  <!-- IMAGE -->
  <figure class="mb-20">
    <img class="img-fluid" src="<?= base_url('asset/upload/'.$pedia['photo']);?>" alt="img" />
  </figure>
  <!-- /IMAGE -->

  <!-- VIDEO -->
  <!--
    <div class="mb-20 embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="http://player.vimeo.com/video/8408210" width="800" height="450"></iframe>
    </div>
    -->
  <!-- /VIDEO -->


  <!-- article content -->
  <p class="dropcap left"><?= $pedia['content'];?></p>
  <!-- /article content -->


  <div class="divider divider-dotted">
    <!-- divider -->
  </div>

  <!-- SHARE POST -->
  <div class="clearfix mt-30">


    <span class="float-left mt-6 bold hidden-xs-down">
      Share Post :
    </span>

    <a href="#" class="social-icon social-icon-sm social-icon-transparent social-facebook float-left" data-toggle="tooltip"
     data-placement="top" title="Facebook">
      <i class="icon-facebook"></i>
      <i class="icon-facebook"></i>
    </a>

    <a href="#" class="social-icon social-icon-sm social-icon-transparent social-twitter float-left" data-toggle="tooltip"
     data-placement="top" title="Twitter">
      <i class="icon-twitter"></i>
      <i class="icon-twitter"></i>
    </a>

    <a href="#" class="social-icon social-icon-sm social-icon-transparent social-instagram float-left" data-toggle="tooltip"
     data-placement="top" title="Instagram">
      <i class="icon-instagram2"></i>
      <i class="icon-instagram2"></i>
    </a>

    <a href="#" class="social-icon social-icon-sm social-icon-transparent social-pinterest float-left" data-toggle="tooltip"
     data-placement="top" title="Pinterest">
      <i class="icon-pinterest"></i>
      <i class="icon-pinterest"></i>
    </a>

    <a href="#" class="social-icon social-icon-sm social-icon-transparent social-call float-left" data-toggle="tooltip"
     data-placement="top" title="Email">
      <i class="icon-email3"></i>
      <i class="icon-email3"></i>
    </a>

  </div>
  <!-- /SHARE POST -->


  <div class="divider">
    <!-- divider -->
  </div>


  <ul class="pager">
    <li class="previous"><a class="b-0" href="#">&larr; Previous Post</a></li>
    <li class="next"><a class="b-0" href="#">Next Post &rarr;</a></li>
  </ul>


  <div class="divider">
    <!-- divider -->
  </div>

</div>

</div>


</div>
</section>
<!-- / -->
