<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('asset/dist/img/user.png');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <br>
          <?php if($this->session->userdata('uType') == 1): ?>
            <p>Super Admin</p>
          <?php else: ?>
            <p>Admin</p>
          <?php endif; ?>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php if($this->session->userdata('uType') == 1): ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-id-badge"></i> <span>Admin</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?=site_url('auth/regis');?>"><i class="fa fa-user-plus"></i> Admin</a></li>
            </ul>
          </li>
          <li class="active">
            <a href="#">Slider</a>
          </li>
          <li class="active">
            <a href="#">Promotion</a>
          </li>
          <li class="active">
            <a href="#">AGM-Pedia</a>
          </li>
          <li class="active">
            <a href="#">Location Stores</a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-tags"></i> <span>Manage Products</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?= site_url('home/sa_brand');?>">Brands</a></li>
              <li class="active"><a href="<?= site_url('home/sa_cat');?>">Categories</a></li>
              <li class="active"><a href="<?= site_url();?>">Products</a></li>
              <li class="active"><a href="<?= site_url();?>">Rating</a></li>
              <li class="active"><a href="<?= site_url();?>">Best Order</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-id-badge"></i> <span>Store Owners</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="<?=site_url('auth/regis');?>"><i class="fa fa-user-plus"></i> Store Owner</a></li>
            </ul>
          </li>
          <li class="active">
            <a href="#">Voucher</a>
          </li>
          <li class="active">
            <a href="#">Distributor</a>
          </li>
          <li class="active">
            <a href="#">Products</a>
          </li>
        <?php endif; ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
