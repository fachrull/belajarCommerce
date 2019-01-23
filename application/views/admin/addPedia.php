<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
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
                <input type="text" maxlength="125" name="sContent" placeholder="Short news (max 100 characters)">
              </label>
              <label class="input mb-10">
                <textarea id="editor1" name="content" rows="8" cols="124" placeholder="News"></textarea>
              </label>
              <label class="input mb-10">
                <label for="thumbnail">Thumbnail pedia</label>
                <input type="file" name="thumbnail" title="Thumbnail pedia">
              </label>
              <label class="input mb-10">
                <label for="phot">Image pedia</label>
                <input type="file" name="photo" title="Image pedia">
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
</div>

<script>
  $(function(){
    $('textarea#content').froalaEditor()
  });
</script>
