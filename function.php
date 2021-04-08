<?php

date_default_timezone_set('asia/jakarta');
session_start();


require 'connection.php';

function base_url($url = null)
{
  $base_url = "http://localhost/bansos";

  if ($url != null) {
    return $base_url . "/" . $url;
  } else {
    return $base_url;
  }
}

// registrasi
function register($data)
{
  global $conn;

  $nama  = stripslashes($data["name"]);
  $user  = strtolower(stripslashes($data["username"]));
  $pass  = $data["password1"];
  $pass1 = $data["password2"];

  // cek apakah ada username yang sama di database
  $cek_username = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$user'");

  // mengambil field row
  // mengecek apakah username sudah digunakan?
  if (mysqli_fetch_assoc($cek_username)) {
    header("Location:registrasi.php?error");
    return false;
  }

  //cek konfirmasi password
  if ($pass !== $pass1) {
    header("Location:registrasi.php?error1");
    return false;
  }

  //enkripsi password
  $enkripsi_password = password_hash($pass, PASSWORD_DEFAULT);

  //masukan kedalam database
  $query = "INSERT INTO tb_user VALUES ('','$nama','$user','$enkripsi_password')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function query($kuery)
{
  global $conn;
  $result = mysqli_query($conn, $kuery);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function hapus_data_training($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tb_data_training WHERE id='$id'");
  return mysqli_affected_rows($conn);
}

function hapus_data_klasifikasi($nis)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tb_hasil WHERE nis='$nis'");
  return mysqli_affected_rows($conn);
}
