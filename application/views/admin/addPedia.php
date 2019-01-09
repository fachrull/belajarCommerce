<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
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
</div>
