<?php if ($user[0]['user_group'] != 4) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card mt-3 mb-3">
      <div class="card-header">
        <h3><i class="fas fa-fw fa-money-check-alt"></i> Payment Status </h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" style="vertical-align: middle;">Id</th>
                <th class="text-center" style="vertical-align: middle;">Fee Name</th>
                <th class="text-center" style="vertical-align: middle;">Fee Cost</th>
                <th class="text-center" style="vertical-align: middle;">Status</th>
                <th class="text-center" style="vertical-align: middle;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $index = 1;
                foreach ($statuses as $status) { 
                  foreach ($fees as $key => $fee) {
                    if ($fee['id'] != $status['fee_id'])
                      continue;
              ?>
              <tr>
                <td class="text-center" style="vertical-align: middle;"><?php echo $index; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $fee['fee_name']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $fee['cost']; ?></td>
                <td class="text-center" style="vertical-align: middle;">
                  <?php if ($status['status'] == 0) { ?>
                  <span style="font-size: 15px;" class="badge badge-pill badge-danger">Pending</span>
                  <?php } else { ?>
                  <span style="font-size: 15px;" class="badge badge-pill badge-success">Paid</span>
                  <?php } ?>
                </td>
                <td class="text-center" style="vertical-align: middle;"><?php if ($status['status'] == 0) { ?><a href="<?php echo base_url()?>backend/pay?fee_name=<?php echo $fee['fee_name']?>&fee_cost=<?php echo $fee['cost']?>&fee_id=<?php echo $status['id']?>" class="btn blue" role="button"><i class="fa fa-money-check-alt"></i> Pay now </a><?php } ?></a>
                </td>
              </tr>
              <?php
                  }
                  $index++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>