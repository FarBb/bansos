<?php
session_start();
include '../connection.php';


if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $pekerjaanayah = $_POST['pekerjaan_ayah'];
  $pendapatanayah = $_POST['pendapatan_ayah'];
  $pekerjaanibu = $_POST['pekerjaan_ibu'];
  $pendapatanibu = $_POST['pendapatan_ibu'];
  $prestasiakedemik = $_POST['nilai'];
  $jumlahsaudara = $_POST['jumlah_saudara'];
  $jarak_r = $_POST['jarak_rumah'];
  $keterangan = $_POST['keterangan'];

  // fuzzy Tsqukamoto
  // nilai minimum
  if ($pendapatanayah <= 0) {
    $bobotpendapatanayah = 1;
  } elseif ($pendapatanayah > 0 && $pendapatanayah <= 7000000) {
    $bobotpendapatanayah = (7000000 - $pendapatanayah) / (7000000 - 0);
  } else {
    $bobotpendapatanayah = 0;
  }

  if ($pendapatanibu <= 0) {
    $bobotpendapatanibu = 1;
  } elseif ($pendapatanibu > 0 && $pendapatanibu <= 7000000) {
    $bobotpendapatanibu = (7000000 - $pendapatanibu) / (7000000 - 0);
  } else {
    $bobotpendapatanibu = 0;
  }

  //nilai maximum
  if ($jumlahsaudara <= 1) {
    $bobotsaudara = 0;
  } elseif ($jumlahsaudara > 1 && $jumlahsaudara <= 5) {
    $bobotsaudara = ($jumlahsaudara - 1) / (5 - 1);
  } else {
    $bobotsaudara = 1;
  }

  if ($jarak_r <= 1) {
    $bobotjarak = 0;
  } elseif ($jarak_r > 1 && $jarak_r <= 10) {
    $bobotjarak = ($jarak_r - 1) / (10 - 1);
  } else {
    $bobotjarak = 1;
  }


  $sql = "UPDATE tb_data_training SET nama = '$nama', pekerjaan_ayah = '$pekerjaanayah', pendapatan_ayah = '$pendapatanayah', pekerjaan_ibu = '$pekerjaanibu', pendapatan_ibu = '$pendapatanibu', jumlah_saudara = '$jumlahsaudara', jarak_rumah = '$jarak_r', keterangan = '$keterangan', bobot_jarak = '$bobotjarak', prestasi_akedemik = '$prestasiakedemik', bobot_pendapatan_ayah = '$bobotpendapatanayah', bobot_pendapatan_ibu = '$bobotpendapatanibu', bobot_saudara = '$bobotsaudara'  WHERE id = '$id'";


  if (mysqli_query($conn, $sql)) {
    echo "<script>
	  	alert('Data Berhasil Diubah');
	  	window.location = '../admin/data_traning.php' 
	  	</script>";
  } else {
    echo "<script>
	  	alert('Terjadi Kesalahan');
	  	window.location = 'data_training_edit.php?id=$id';
	  	</script>";
  }
} else {
  header('Location: ../admin/index.php');
}
