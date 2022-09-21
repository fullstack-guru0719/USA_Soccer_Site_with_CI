<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LA AZTECS</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url();?>assets/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/admin/vendor/datatables/responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>assets/admin/css/sb-admin.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/admin/vendor/summernote/summernote-lite.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/admin/vendor/videojs/video-js.min.css" rel="stylesheet">

  <link href="<?php echo base_url()?>assets/login/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
  <!-- <link href="<?php echo base_url();?>assets/admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen"> -->
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css" rel="stylesheet">

  <link rel="shortcut icon" href="<?php echo base_url();?>assets/favicon.ico">

  <?php echo '<script type="text/javascript"> var base_url = "' . base_url() . '"; </script>'?>
  
  <style type="text/css">
    label.upload-btn{
      width: 100%;
      height: 350px;
      display: flex;
      align-items: center;
      margin: auto;
      border: 1px solid #ced4da;
      color: #ced4da;
      cursor: pointer;
      border-radius: 4px;
      position: relative;
      overflow: hidden;
    }
    label.upload-btn p{
      width: 100%;
      text-align: center;
      font-size: 25px;
    }
    label.upload-btn:hover,label.upload-gal-btn:hover{
      color: #ffffff;
      background: #29aae3;
    }
    label.upload-btn svg{
      margin: auto;
      display: block;
      font-size: 70px;
    }
    .p-image-preview{
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>
  
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo base_url();?>">LA AZTECS</a>

    <button class="btn btn-link btn-sm text-white mr-auto mr-1" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto ml-md-0">
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo base_url() . $user[0]['photo'];?>" style="border-radius: 50%; height: 25px; width: 25px;">&nbsp;&nbsp;<?php echo $user_name; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?php echo base_url();?>">Go to Homepage</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/profile">Edit Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item <?php if ($menu == 'index' || $menu == 'profile') { echo ' active';}?>">
        <a class="nav-link" href="<?php echo base_url();?>backend">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown <?php if ($menu == 'inbox' || $menu == 'outbox' || $menu == 'show_mail') { echo ' active';}?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-mail-bulk"></i>
          <span>Messages</span></a>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url();?>backend/inbox_mail">Inbox</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/outbox_mail">Outbox</a>
        </div>
      </li>
      <?php if($user[0]['user_group'] == 4) { ?>
      <li class="nav-item <?php if ($menu == 'payments') { echo ' active';}?>">
        <a class="nav-link" href="<?php echo base_url();?>backend/pending_payments">
          <i class="fas fa-fw fa-user-check"></i>
          <span>Pending Payments</span></a>
      </li>
      <?php } ?>
      <?php if($user[0]['user_group'] != 4) { ?>
      <li class="nav-item dropdown <?php if ($menu == 'fees' || $menu == 'acheive' || $menu == 'pending_status') { echo ' active';}?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-users"></i>
          <span>Pending Payments</span></a>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <?php if($user[0]['user_group'] == 1) { ?>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/fees">Create Fee</a>
          <?php } ?>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/pending_status">Pending Status</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/acheive">Acheive</a>
        </div>
      </li>
      <?php } ?>
      <?php if($user[0]['user_group'] == 1) { ?>
      <li class="nav-item dropdown <?php if ($menu == 'users' || $menu == 'user-add' || $menu == 'user-edit' || $menu == 'roles') { echo ' active';}?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span></a>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url();?>backend/users">All Users</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/users/add_user">Add User</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/roles">All User Groups</a>
        </div>
      </li>
      <li class="nav-item <?php if ($menu == 'sponsors') { echo ' active';}?>">
        <a class="nav-link" href="<?php echo base_url();?>backend/sponsors">
          <i class="fas fa-user-tie"></i>
          <span>Sponsers</span>
        </a>
      </li>
      <li class="nav-item <?php if ($menu == 'options') { echo ' active';}?>">
        <a class="nav-link" href="<?php echo base_url();?>backend/options">
          
          <span>Registration options</span></a>
      </li>
      <li class="nav-item <?php if ($menu == 'tncs') { echo ' active';}?>">
        <a class="nav-link" href="<?php echo base_url();?>backend/tncs">
                    <span>Terms and Conditions</span></a>
      </li>
      <?php } ?>
      <?php if($user[0]['user_group'] == 2) { ?>
      <li class="nav-item dropdown <?php if ($menu == 'staffs' || $menu == 'staff-add' || $menu == 'staff-edit') { echo ' active';}?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Staffs</span></a>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url();?>backend/staffs">All Staffs</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/staffs/add_staff">Add Staff</a>
        </div>
      </li>
      <?php } ?>
      <?php if($user[0]['user_group'] == 1 || $user[0]['user_group'] == 2) { ?>
      <!-- <li class="nav-item <?php if ($menu == 'schedules') { echo ' active';}?>">
        <a class="nav-link" href="<?php echo base_url();?>backend/schedules">
          <i class="fas fa-fw fa-calendar-minus"></i>
          <span>Schedules</span></a>
      </li> -->
      <li class="nav-item dropdown <?php if ($menu == 'players') { echo ' active';}?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-life-ring"></i>
          <span>Update Roster</span></a>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url();?>backend/players">All Players</a>
        </div>
      </li>
      <li class="nav-item <?php if ($menu == 'teams') { echo ' active';}?>">
        <a class="nav-link" href="<?php echo base_url();?>backend/teams">
          <i class="fas fa-fw fa-life-ring"></i>
          <span>All Teams</span></a>
      </li>
      <li class="nav-item dropdown <?php if ($menu == 'slider-manage' || $menu == 'slider-edit' || $menu == 'results' || $menu == 'news' || $menu == 'schedules' || $menu == 'training-manage' || $menu == 'tournamet-manage' || $menu == 'standing-manage') { echo ' active';}?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-edit"></i>
          <span>Update Home Page</span></a>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url();?>backend/slider_manage">Slider Manage</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/latest_result">Latest Result</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/latest_news">Latest News</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/latest_videos">Latest Videos</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/schedules">Schedule Manage</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/training_manage">Tranining Manage</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/tournament_manage">Tournament Manage</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/standing_manage">Standing Manage</a>
        </div>
      </li>
      <li class="nav-item <?php if ($menu == 'announces') { echo ' active';}?>">
        <a class="nav-link" href="<?php echo base_url();?>backend/announces">
          <i class="fas fa-fw fa-bullhorn"></i>
          <span>Announcements</span></a>
      </li>
      <?php } ?>
      <?php if ($user[0]['user_group'] == 1) { ?>
      <li class="nav-item dropdown <?php if ($menu == 'products' || $menu == 'product_payments' || $menu == 'product-add' || $menu == 'product-edit' || $menu == 'colors' || $menu == 'sizes' || $menu == 'categories' || $menu == 'delivery') { echo ' active';}?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Shop Manage</span></a>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url();?>backend/products">All Products</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/categories">All Product Group</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/colors">All Colors</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/sizes">All Sizes</a>
          <a class="dropdown-item" href="<?php echo base_url();?>backend/delivery">All Delivery Options</a>
          <!-- <a class="dropdown-item" href="<?php echo base_url();?>backend/product_payments">Product Payment</a> -->
        </div>
      </li>
      <?php } ?>
      <?php if ($user[0]['user_group'] == 1):?>
      <li class="nav-item <?php if ($menu == 'settings') { echo ' active';}?>">
        <a class="nav-link" href="<?php echo base_url();?>backend/settings">
          <i class="fas fa-cogs"></i>
          <span>Settings</span></a>
      </li>
      <?php endif;?>
    </ul>