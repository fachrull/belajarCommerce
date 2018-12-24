<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Testing AGM</title>
    <link rel="stylesheet" href="<?= base_url('asset/css/materialize.min.css');?>">
  </head>
  <body>
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper">
          <a href="<?=site_url();?>" class="brand-logo">eCommerce</a>
          <ul class="right">
            <!-- This is navbar for super admin -->
            <?php if($this->session->userdata('uType') == 1): ?>
              <li><a href="<?= site_url('home/admin');?>">Admin</a></li>


            <!-- This is navbar for store owner -->
            <?php elseif($this->session->userdata('uType') == 2): ?>
              <li><a href="<?= site_url('home/store');?>">My Store</a></li>
              <li><a href="#">Invoice</a></li>
              <li><a href="#">Product</a></li>

            <!-- This is navbar for user -->
            <?php elseif($this->session->userdata('uType') == 3): ?>
              <li><a href="<?= site_url('home/customer');?>">Profile</a></li>
              <li><a href="#">Pembelian</a></li>

            <!-- This is navbar for admin -->
            <?php elseif($this->session->userdata('uType') == 4): ?>
              <li><a href="#">Voucher</a></li>
              <li><a href="#">Distributor</a></li>
              <li><a href="#">Products</a></li>
              <li><a href="<?= site_url('home/adminStores');?>">Stores</a></li>
            <?php endif; ?>

            <!-- This is navbar logout or login -->
            <?php if($this->session->userdata('isLogin', TRUE)): ?>
              <li><a href="<?= site_url('auth/logout');?>">Logout</a></li>
            <?php else: ?>
              <li><a href="<?= site_url('auth/login');?>">Login</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </nav>
    </div>
    <main class="container">
