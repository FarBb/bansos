<?php
session_start();
include '../connection.php';

if (isset($_POST['tambah'])) {

  $nama = $_POST['nama'];
  $pekerjaanayah = $_POST['pekerjaan_ayah'];
  $pendapatanayah = $_POST['pendapatan_ayah'];
  $pekerjaanibu = $_POST['pekerjaan_ibu'];
  $pendapatanibu = $_POST['pendapatan_ibu'];
  $prestasiakedemik = $_POST['nilai'];
  $jumlahsaudara = $_POST['jumlah_saudara'];
  $jarak_r = $_POST['jarak_rumah'];
  $keterangan = $_POST['keterangan'];

  echo $pendapatanayah;
  // var_dump($pendapatanayah);
  // var_dump($pendapatanibu);
  // die;

  // fuzzy Tsqukamoto
  $x;
  $y;
  $z;

  function findMin($x, $y)
  {
    if ($x <= $y) {
      return $x;
    } else {
      return $y;
    }
  }

  // bobot minimum
  function bobot_minimum_a($pendapatanayah)
  {
    if ($pendapatanayah <= 0) {
      return 1;
    } elseif ($pendapatanayah > 0 && $pendapatanayah < 1000000) {
      return (1000000 - $pendapatanayah) / (1000000 - 0);
    } else {
      return  0;
    }
  }

  // bobot sedang
  function bobot_sedang_a($pendapatanayah)
  {
    if ($pendapatanayah <= 1000000) {
      return  1;
    } elseif ($pendapatanayah > 1000000 && $pendapatanayah < 6000000) {
      return (6000000 - $pendapatanayah) / (6000000 - 1000000);
    } else {
      return  0;
    }
  }

  // bobot tinggi
  function bobot_tinggi_a($pendapatanayah)
  {
    if ($pendapatanayah <= 6000000) {
      return 1;
    } elseif ($pendapatanayah > 6000000 && $pendapatanayah < 7000000) {
      return (7000000 - $pendapatanayah) / (7000000 - 1000000);
    } else {
      return 0;
    }
  }


  // bobot minimum
  function bobot_minimum_ibu($pendapatanibu)
  {
    if ($pendapatanibu <= 0) {
      return 1;
    } elseif ($pendapatanibu > 0 && $pendapatanibu < 1000000) {
      return (1000000 - $pendapatanibu) / (1000000 - 0);
    } else {
      return  0;
    }
  }

  // bobot sedang
  function bobot_sedang_ibu($pendapatanibu)
  {
    if ($pendapatanibu <= 1000000) {
      return  1;
    } elseif ($pendapatanibu > 1000000 && $pendapatanibu < 6000000) {
      return (6000000 - $pendapatanibu) / (6000000 - 1000000);
    } else {
      return  0;
    }
  }

  // bobot tinggi
  function bobot_tinggi_ibu($pendapatanibu)
  {
    if ($pendapatanibu <= 6000000) {
      return 1;
    } elseif ($pendapatanibu > 6000000 && $pendapatanibu < 7000000) {
      return (7000000 - $pendapatanibu) / (7000000 - 1000000);
    } else {
      return 0;
    }
  }

  function bobotrendah($alfa)
  {
    if ($alfa > 0 && $alfa < 1) {
      return (30 - ($alfa * 10));
    } elseif ($alfa == 1) {
      return 30;
    } else {
      return 0;
    }
  }

  function bobotsedang($alfa)
  {
    if ($alfa > 0 && $alfa < 1) {
      return (50 - ($alfa * 10));
    } elseif ($alfa == 1) {
      return 50;
    } else {
      return 40;
    }
  }

  function bobottinggi($alfa)
  {
    if ($alfa > 0 && $alfa < 1) {
      return (70 - ($alfa * 10));
    } elseif ($alfa == 1) {
      return 70;
    } else {
      return 0;
    }
  }

  function aturan($pendapatanayah, $pendapatanibu)
  {
    //1. Jika fasilitas pendapatan ayah minimal dan pendapatan ibu minimal maka bobot tinggi
    $alfa[0] = findMin(bobot_minimum_a($pendapatanayah), bobot_minimum_ibu($pendapatanibu));
    $z[0] = bobottinggi($alfa[0]);
    //2. Jika fasilitas pendapatan ayah minimal dan pendapatan ibu minimal maka bobot tinggi
    $alfa[1] = findMin(bobot_sedang_a($pendapatanayah), bobot_minimum_ibu($pendapatanibu));
    $z[1] = bobottinggi($alfa[1]);
    //3. Jika fasilitas pendapatan ayah minimal dan pendapatan ibu minimal maka bobot tinggi
    $alfa[2] = findMin(bobot_tinggi_a($pendapatanayah), bobot_minimum_ibu($pendapatanibu));
    $z[2] = bobotsedang($alfa[2]);
    //4. Jika fasilitas pendapatan ayah minimal dan pendapatan ibu minimal maka bobot tinggi
    $alfa[3] = findMin(bobot_minimum_a($pendapatanayah), bobot_sedang_ibu($pendapatanibu));
    $z[3] = bobottinggi($alfa[3]);

    $alfa[4] = findMin(bobot_minimum_a($pendapatanayah), bobot_tinggi_ibu($pendapatanibu));
    $z[4] = bobotsedang($alfa[4]);
    //5. Jika fasilitas pendapatan ayah minimal dan pendapatan ibu minimal maka bobot tinggi
    $alfa[5] = findMin(bobot_sedang_a($pendapatanayah), bobot_sedang_ibu($pendapatanibu));
    $z[5] = bobotsedang($alfa[5]);
    //6. Jika fasilitas pendapatan ayah minimal dan pendapatan ibu minimal maka bobot tinggi
    $alfa[6] = findMin(bobot_sedang_a($pendapatanayah), bobot_tinggi_ibu($pendapatanibu));
    $z[6] = bobotrendah($alfa[6]);
    //7. Jika fasilitas pendapatan ayah minimal dan pendapatan ibu minimal maka bobot tinggi
    $alfa[7] = findMin(bobot_tinggi_a($pendapatanayah), bobot_tinggi_ibu($pendapatanibu));
    $z[7] = bobotrendah($alfa[7]);
    //8. Jika fasilitas BIASA dan ukuran SEMPIT dan jarak SEDANG maka harga MURAH


    // defuzifikasi
    $temp1 = 0;
    $temp2 = 0;
    $hasil = 0;

    for ($i = 0; $i < 8; $i++) {
      $temp1 = $temp1 + $alfa[$i] * $z[$i];
      $temp2 = $temp2 + $alfa[$i];
    }

    print_r($alfa);
    print_r($z);

    $hasil = $temp1 / $temp2;
    return round($hasil);
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

  $defuzifikasi = aturan($pendapatanayah, $pendapatanibu);

  $sql = "INSERT INTO tb_data_training VALUES('','$nama','$pekerjaanayah','$pendapatanayah', '$pekerjaanibu','$pendapatanibu','$jumlahsaudara','$bobotsaudara','$jarak_r','$bobotjarak','$prestasiakedemik', '$keterangan', $defuzifikasi)";


  if (mysqli_query($conn, $sql)) {
    echo "<script>
      alert('Data baru berhasil ditambahkan!');
      window.location = '../admin/data_traning.php';
      </script>";
  } else {
    die(mysqli_error($conn));
    echo "<script>
      alert('Data baru gagal ditambahkan!');
      window.location = 'tambah_data.php';
      </script>";
  }
} else {
  header('Location: ../admin/index.php');
}
