<?php
require '../connection.php';
require '../function.php';

$tangkap_id = $_GET["nis"];

if (hapus_data_klasifikasi($tangkap_id) > 0) {
  echo "
    <script>
        alert('Data Berhasil Dihapus');
        document.location.href='hasil_klasifikasi.php';
    </script>
    ";
} else {
  echo "
    <script>
        alert('Data Gagal Dihapus!');
        document.location.href='hasil_klasifikasi.php';
    </script>
    ";
}
