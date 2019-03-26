<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content">
    <h1 class="text-center">ADD AGM-PEDIA</h1>
      <div class="container-fluid">
        <div class="register-box mt-0" style="width: auto !important">
          <div class="register-box-body">
          <div class="row">
          <div class="col-md-12 col-sm-6">
            <!-- ALERT -->
            <?php if($this->session->has_userdata('error')): ?>
              <div class="alert alert-mini alert-danger mb-30">
                <strong>Oh snap!</strong> <?= $this->session->flashdata('error');?>
              </div>
            <?php elseif($this->input->post('items') == NULL): ?>
              <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
            <?php endif;?>
            <!-- /ALERT -->
            <?= form_open_multipart('admin/addPedia', array('class' => 'm-0 sky-form')); ?>
            <p class="register-box-msg">Add a AGM-Pedia Article</p>
              <label class="input mb-10">
                <input type="text" name="title" class="form-control" placeholder="Title">
              </label>
              <label class="input mb-10">
                <input class="form-control" type="text" maxlength="125" name="sContent" placeholder="Short news (max 100 characters)">
              </label>
              <label class="input mb-10">
                <textarea id="editor1" name="content" rows="8" cols="124" placeholder="News"></textarea>
              </label>
              <label class="input mb-10">
                <label for="thumbnail"><b>Thumbnail pedia</b></label>
                <input type="file" name="thumbnail" title="Thumbnail pedia">
              </label>
              <label class="input mb-10">
                <label for="phot"><b>Image pedia</b></label>
                <input type="file" name="photo" title="Image pedia">
              </label>
            <div class="row">
                <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-oldblue btn-default"><i class="fa fa-plus"></i> Add pedia</button>
                </div>
            </div>
          </form>
          </div>
        </div>
          </div>
        </div>
      </div>
    </section>
</div>

<script>
  $(function(){
    $('textarea#content').froalaEditor()
  });
</script>


