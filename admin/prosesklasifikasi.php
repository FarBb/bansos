<?php

function hitung($k, $nis, $pekerjaanayah, $pendapatanayah, $bobotpendapatanayah, $pekerjaanibu, $pendapatanibu, $bobotpendapatanibu, $jumlahsaudara, $bobotsaudara, $jarak_r, $bobotjarak, $prestasiakedemik, $kelas)
{

  include '../connection.php';
  mysqli_query($conn, "DELETE FROM tb_temp");
  mysqli_query($conn, "DELETE FROM tb_sort");


  // mengambil id terakhir
  $last_id = mysqli_query($conn, "SELECT * FROM tb_data_training ORDER BY id DESC LIMIT 1");
  while ($id = mysqli_fetch_row($last_id)) {
    $jmldata = $id[0];
  }

  for ($i; $i <= $jmldata; $i++) {
    $training = mysqli_query($conn, "SELECT * FROM tb_data_training WHERE id = $i");

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


    while ($datatraining = mysqli_fetch_row($training)) {
      $akar = sqrt(pow(($bobotpendapatanayah - $datatraining[4]), 2) + pow(($bobotpendapatanibu - $datatraining[7]), 2) + pow(($bobotsaudara - $datatraining[9]), 2) + pow(($bobotjarak - $datatraining[11]), 2) + pow(($prestasiakedemik - $datatraining[12]), 2));

      // simpan kedalam tabel temp
      $sql2 = mysqli_query($conn, "INSERT INTO tb_temp VALUES ('$datatraining[0]','$datatraining[1]','$datatraining[2]','$datatraining[3]','$datatraining[4]','$datatraining[5]','$datatraining[6]','$datatraining[7]','$datatraining[8]','$datatraining[9]','$datatraining[10]','$datatraining[11]','$datatraining[12]','$akar','$datatraining[13]')");
    }
  }

  // mengambil data berdasarkan tetangga terdekat (K)
  $sql3 = "SELECT * FROM tb_temp ORDER BY jarak ASC LIMIT $k";

  $data = mysqli_query($conn, $sql3);
  while ($baris = mysqli_fetch_row($data)) {
    $sql4 = mysqli_query($conn, "INSERT INTO tb_sort (id,nama,pekerjaan_ayah,pendapatan_ayah,bobot_pendapatan_ayah,pekerjaan_ibu,pendapatan_ibu,bobot_pendapatan_ibu,jumlah_saudara,bobot_saudara,jarak_rumah,bobot_jarak,prestasi_akedemik,jarak,keterangan) VALUES('$baris[0]','$baris[1]','$baris[2]','$baris[3]','$baris[4]','$baris[5]','$baris[6]','$baris[7]','$baris[8]','$baris[9]','$baris[10]','$baris[11]','$baris[12]','$baris[13]','$baris[14]')");
  }
}
