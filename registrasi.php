<?php
require 'connection.php';
require './function.php';

if (isset($_POST["register"])) {
  if (register($_POST) > 0) {
    header("Location: login.php?success");
  } else {
    echo mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mochammad Faris">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container col-md-5">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row w ithin Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-1">Create an Account!</h1>
              </div>
              <div class="text-center">
                <img src="<?= base_url('assets/img/images.png') ?>" alt="" width="200px" style="margin-bottom: 10px;">
              </div>

              <?php
              if (isset($_GET['error'])) : ?>
                <div class="row">
                  <div class="col-lg-12" col-lg-offset-3>
                    <div class="alert alert-danger alert-dismissable" role="alert">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <div class="text-center">
                        <span class="glyphicon glyphicon-exclamation-sign" arial-hidden="true"></span>
                        <strong>Registrasi Gagal!</strong> <br>
                        Username Telah Terdaftar!
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <?php
              if (isset($_GET['error1'])) : ?>
                <div class="row">
                  <div class="col-lg-12" col-lg-offset-3>
                    <div class="alert alert-danger alert-dismissable" role="alert">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <div class="text-center">
                        <span class="glyphicon glyphicon-exclamation-sign" arial-hidden="true"></span>
                        <strong>Registrasi Gagal!</strong> <br>
                        Password anda berbeda!
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <form class="user" method="POST">
                <div class="form-group row">
                  <div class="col-sm-12 mb-12 mb-sm-12">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Full Name" name="name">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username" name="username">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password1">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="password2">
                  </div>
                </div>
                <hr>
                <input type="submit" class="btn btn-primary btn-user btn-block" value="REGISTER" name="register">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>