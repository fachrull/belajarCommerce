<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Detail Article
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
          <h2>
            <?= $article['title']?>
            </h2>
              <div class="row">
                  <div class="col-xs-12 mb-20">
                      <img src="<?= base_url('asset/upload/pedia/'.$article['photo']);?>" alt="<?= $article['title'];?>">
                  </div>
              </div>
          <div class="row">
            <div class="product-detail">
                <div class="col-xs-12 col-md-12 mb-20">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Sub-content (Headline)</th>
                                <td><?= $article['sub_content']?></td>
                            </tr>
                            <tr>
                                <th>Content</th>
                                <td class="word-wrap"><?= $article['content'];?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><?php echo $article['status'] == 1? 'Active': 'Inactive'; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
              </div>
            </div>
            <a href="<?=site_url('admin/editpedia/'.$article['id'])?>" class="btn btn-oldblue btn-default" style="float:right;">Edit Article</a>
            <a href="<?= site_url('admin/sa_agmpedia');?>"><button class="btn btn-oldblue btn-default">Back</button></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
