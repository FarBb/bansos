<?php
require '../connection.php';
require '../function.php';

$tangkap_id = $_GET["id"];

if (hapus_data_training($tangkap_id) > 0) {
  echo "
    <script>
        alert('Data Berhasil Dihapus');
        document.location.href='data_traning.php';
    </script>
    ";
} else {
  echo "
    <script>
        alert('Data Gagal Dihapus!');
        document.location.href='data_traning.php';
    </script>
    ";
}
