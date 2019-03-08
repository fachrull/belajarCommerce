<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Manage Store</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
          <table id="dataTable" class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Company Name</th>
              <th>Address</th>
              <th>Province</th>
              <th>City</th>
              <th>Sub District</th>
              <th>Phone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php for($i = 0; $i < count($posts); $i++): ?>
              <tr>
                <td><?= $no=$i+1;?></td>
                <td><?= $posts[$i]['company_name']?></td>
                <td><?= $posts[$i]['address']?></td>
                <td><?= $provinces[$i][0]['province']?></td>
                <td><?= $cities[$i][0]['city']?></td>
                <td><?= $sub_districts[$i][0]['sub_district']?></td>
                <td><?= $posts[$i]['phone1']?></td>
                <td>
                  <a href="<?=site_url('admin/stores/'.$posts[$i]['id']);?>" type="submit" class="btn btn-oldblue"><i class="fa fa-info"></i></a>
                </td>
              </tr>
            <?php endfor; ?>
            </tbody>
        </table>
      </div>
      </div>
    </div>
    </div>
  </section>
</div>
