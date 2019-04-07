<?php
  $login = $this->session->userdata('logged_in');
  $nama = $this->session->userdata('nama');
  $nim = $this->session->userdata('nim');

  if($login){

  }else{
    $this->session->set_flashdata('error_page', 'TRUE');
    redirect(base_url());
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title><?php echo $judul; ?> | KELAS 4.0</title>
    <style media="screen">
      #logout{
        color: red;
      }
      #logout:hover{
        color: white;
      }
    </style>
  </head>
  <body>
  <!-- Nav -->
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="#">KELAS 4.0</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>Dashboard">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>Status">STATUS PEMINJAMAN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>History">HISTORY PEMINJAMAN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>Contact">CONTACT US</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link disabled"><b>HELLO <?php echo strtoupper($nama)." / ".$nim; ?></b></a>
        </li>
        <li class="nav-item">
          <form action="<?php echo base_url();?>logout" method="post">
            <input class="btn btn-outline-danger" id="logout" type="submit" name="logout" value="LOGOUT">
          </form>
          <!-- <a class="nav-link btn btn-outline-danger" id="logout">LOGOUT</a> -->
        </li>
      </ul>
    </div>
  </nav>
