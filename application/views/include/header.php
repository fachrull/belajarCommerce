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
            <?php if($this->session->userdata('uType') == 1): ?>
              <li><a href="<?= site_url('home/admin');?>">Admin</a></li>
              <li><a href="<?= site_url('home/store');?>">Stores</a></li>
            <?php elseif($this->session->userdata('uType') == 2): ?>
              <li><a href="<?= site_url('home/store');?>">My Store</a></li>
            <?php elseif($this->session->userdata('uType') == 3): ?>
              <li><a href="<?= site_url('home/customer');?>">My Account</a></li>
            <?php endif; ?>
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
