<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <section class="content">
        <h1 class="text-center">EDIT ARTICLE</h1>
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
                            <?= form_open_multipart('admin/editPedia/'.$article['id'], array('class' => 'm-0 sky-form')); ?>
                            <label class="input mb-10">
                                <label><strong>Title</strong></label>
                                <input type="text" name="title" class="form-control" value="<?=$article['title']?>" placeholder="Title">
                            </label>
                            <label class="input mb-10">
                                <label><strong>Short News</strong></label>
                                <input class="form-control" type="text" maxlength="125" value="<?=$article['sub_content']?>" name="sContent" placeholder="Short news (max 100 characters)">
                            </label>
                            <label class="input mb-10">
                                <label><strong>Content</strong></label>
                                <textarea id="editor1" name="content" rows="8" cols="124" placeholder="News"><?=$article['content']?></textarea>
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
                                <div class="col-md-6 text-felt">
                                    <a href="<?=site_url('admin/sa_agmpedia')?>" class="btn btn-oldblue btn-default">Cancel</a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-oldblue btn-default">Submit</button>
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


