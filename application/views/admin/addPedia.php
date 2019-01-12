<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
<<<<<<< HEAD
  <section class="content-header">
    <h1>
      AGM
      <small> Pedia</small>
    </h1>
  </section>
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-11 offset-md-3 col-sm-6 offset-sm-3">
          <!-- ALERT -->
          <?php if($this->session->has_userdata('error')): ?>
            <div class="alert alert-mini alert-danger mb-30">
              <strong>Oh snap!</strong> <?= $this->session->flashdata('error');?>
            </div>
          <?php elseif($this->input->post('items') == NULL): ?>
            <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
          <?php endif;?>
          <!-- /ALERT -->

          <?= form_open_multipart('admin/addPedia', array('class' => 'm-0 sky-form boxed')); ?>
            <header>
              <i class="fa fa-plus"></i> Add Pedia
            </header>
            <fieldset>
              <label class="input mb-10">
                <input type="text" name="title" class="form-control" placeholder="Title">
              </label>
              <label class="input mb-10">
                <textarea name="content" rows="8" cols="141" placeholder="Content news"></textarea>
              </label>
              <label class="input mb-10">
                <input type="file" name="photo"/>
              </label>
            </fieldset>
            <div class="row mb-20">
              <div class="col-md-12">
                <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i> Add pedia</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
=======
  <section class="content">
      <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <p>Form Input</p>
                            </div>
                            <div class="panel-body">
                                <?php if($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger">
                  <strong>Alert!</strong> <?php echo $this->session->flashdata('error'); ?>
                </div>
                                <?php endif; ?>
                                <form action="<?php echo site_url('home/pediaInputProcess'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group"> 
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Content</label>
                                        <textarea name="content" id="isi" cols="30" rows="10" class="form-control" placeholder="Content News">
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Photo</label>
                                        <input type="file" name="photo" required>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Input">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
>>>>>>> 2d924f0472adb59308389fdc4217121d2bd95949
</div>
