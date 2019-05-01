<?php
  $login = $this->session->userdata('logged_in');
  $nama = $this->session->userdata('nama');
  $nama_b = $this->session->userdata('nama_b');
  $email = $this->session->userdata('email');
  $nip = $this->session->userdata('nip');


  if($login){

  }else{
    redirect(base_url());
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo base_url(); ?>Assets/Admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>Assets/Admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>Assets/Admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>Assets/Admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url(); ?>Assets/Admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url(); ?>Assets/Admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>Assets/Admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>Assets/Admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>Assets/Admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>Assets/Admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>Assets/Admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>Assets/Admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url(); ?>Assets/Admin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->

        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->

        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <a href="<?php echo base_url() ?>" class="btn btn-block">KELAS 4.0 CPanel</a>
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?php echo base_url(); ?>Assets/Admin/images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $nama." / ".$nama_b; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?php echo base_url(); ?>Assets/Admin/images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $nama." ".$nama_b; ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $email; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                              <style media="screen">
                                                .account-dropdown__footer input {
                                                    display: block;
                                                    color: #333;
                                                    padding: 15px 25px;
                                                    font-size: 14px;
                                                    width: 100%;
                                                    border: none;
                                                    background: none;
                                                }

                                                .account-dropdown__footer input:hover {
                                                    background: #4272d7;
                                                    color: #fff;
                                                }

                                                .account-dropdown__footer form i {
                                                    line-height: 1;
                                                    margin-right: 20px;
                                                    font-size: 18px;
                                                    vertical-align: middle;
                                                }
                                              </style>

                                              <form action="<?php echo base_url(); ?>logout" method="post">
                                                <input type="submit" name="logout" value="Logout">
                                              </form>
                                                <!-- <a>
                                                    <i class="zmdi zmdi-power"></i>
                                                    <form action="<?php echo base_url(); ?>logout" method="post">
                                                      <input type="submit" name="logout" value="Logout">
                                                    </form>
                                                </a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->
