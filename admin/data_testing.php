<?php require 'template/header.php' ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="card shadow mb-4 col-lg-6">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
    </div>
    <div class="card-body">
      <form action="klasifikasi.php" method="POST">
        <div class="form-group">
          <input type="hidden" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Nilai K" name="k" value="5">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail2">NIS</label>
          <input type="number" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Nomor Induk Sekolah" name="nis" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Siswa</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap Siswa" name="nama" required>
        </div>

        <div class="form-group">
          <label for="inputState">Kelas</label>
          <select id="inputState" class="form-control" required name="kelas">
            <option selected disabled>Pilih Kelas</option>
            <option value="X-TAV">X-TAV</option>
            <option value="X-TKJ">X-TKJ</option>
            <option value="X-TSM">X-TSM</option>
            <option value="X-AK">X-AK</option>
            <option value="XI-TAV">XI-TAV</option>
            <option value="XI-TKJ">XI-TKJ</option>
            <option value="XI-TSM">XI-TSM</option>
            <option value="XI-AK">XI-AK</option>
            <option value="XII-TAV">XII-TAV</option>
            <option value="XII-TKJ">XII-TKJ</option>
            <option value="XII-TSM">XII-TSM</option>
            <option value="XII-AK">XII-AK</option>
          </select>
        </div>

        <div class="form-group">
          <label for="inputState">Pekerjaan Ayah</label>
          <select id="inputState" class="form-control" required name="pekerjaan_ayah">
            <option selected disabled>Pilih Pekerjaan</option>
            <option value="Buruh">Buruh</option>
            <option value="Honorer">Honorer</option>
            <option value="Karyawan Swasta">Karyawan Swasta</option>
            <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil (PNS)</option>
            <option value="Pegawai Negeri Sipil">Pengangguran</option>
            <option value="Petani">Petani</option>
            <option value="Wirausaha">Wirausaha</option>
            <option value="Wiraswasta">Wiraswasta</option>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Pendapatan Ayah</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Rp.</span>
            </div>
            <input type="number" class="form-control" placeholder="nominal" aria-label="Username" aria-describedby="basic-addon1" name="pendapatan_ayah">
          </div>
        </div>

        <div class="form-group">
          <label for="inputState">Pekerjaan Ibu</label>
          <select id="inputState" class="form-control" name="pekerjaan_ibu" required>
            <option selected disabled>Pilih Pekerjaan</option>
            <option value="Buruh">Buruh</option>
            <option value="Honorer">Honorer</option>
            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga (IRT)</option>
            <option value="Karyawan Swasta">Karyawan Swasta</option>
            <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil (PNS)</option>
            <option value="Petani">Petani</option>
            <option value="Wirausaha">Wirausaha</option>
            <option value="Wiraswasta">Wiraswasta</option>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Pendapatan Ibu</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Rp.</span>
            </div>
            <input type="number" class="form-control" placeholder="nominal" aria-label="Username" aria-describedby="basic-addon1" name="pendapatan_ibu">
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Jarak Rumah Ke Sekolah</label>
          <div class="input-group mb-3">
            <input type="number" class="form-control" placeholder="Jarak Rumah ke Sekolah" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jarak_rumah" required>
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">Kilometer</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Rata Rata Nilai Rapot</label>
          <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Rata-Rata Nilai Rapot" name="nilai" required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Jumlah Saudara Kandung</label>
          <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jumlah Saudara Kandung" name="jumlah_saudara" required>
        </div>

        <hr class="sidebar-divider d-none d-md-block">
        <button type="submit" class="btn btn-primary" name="hitung">Proses Data</button>
      </form>
    </div>
    <!-- proses -->
  </div>
  <!-- <?php if (isset($_POST['hitung'])) {
          include 'prosesklasifikasi.php';
          $k = $_POST['k'];
          $nis = $_POST['nis'];
          $nama = $_POST['nama'];
          $pekerjaanayah = $_POST['pekerjaan_ayah'];
          $pendapatanayah = $_POST['pendapatan_ayah'];
          $pekerjaanibu = $_POST['pekerjaan_ibu'];
          $pendapatanibu = $_POST['pendapatan_ibu'];
          $prestasiakedemik = $_POST['nilai'];
          $jumlahsaudara = $_POST['jumlah_saudara'];
          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
          $jarak_r = $_POST['jarak_rumah'];
          $keterangan = $_POST['keterangan'];
          $kelas = $_POST['kelas'];

          // nilai minimum
          if ($pendapatanayah <= 1000000) {
            $bobotpendapatanayah = 1;
          } elseif ($pendapatanayah > 1000000 && $pendapatanayah <= 5000000) {
            $bobotpendapatanayah = (5000000 - $pendapatanayah) / (5000000 - 1000000);
          } else {
            $bobotpendapatanayah = 0;
          }

          if ($pendapatanibu <= 1000000) {
            $bobotpendapatanibu = 1;
          } elseif ($pendapatanibu > 1000000 && $pendapatanibu <= 5000000) {
            $bobotpendapatanibu = (5000000 - $pendapatanibu) / (5000000 - 1000000);
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

          $query = "INSERT INTO tb_hasil VALUES('$nis', '$nama', '$pekerjaanayah','$pendapatanayah', '$bobotpendapatanayah','$pekerjaanibu','$pendapatanibu','$bobotpendapatanibu','$jumlahsaudara','$bobotsaudara','$jarak_r','$bobotjarak','$prestasiakedemik','', '$kelas')";

          $sql = mysqli_query($conn, $query);

          hitung($k, $nis, $pekerjaanayah, $pendapatanayah, $bobotpendapatanayah, $pekerjaanibu, $pendapatanibu, $bobotpendapatanibu, $jumlahsaudara, $bobotsaudara, $jarak_r, $bobotjarak, $prestasiakedemik, $kelas); ?>

    <h1 style="margin-top: 80px;">Hasil Perhitungan K-Nearest Neightbor : </h1>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Pekerjaan Ayah</th>
            <th>Pendapatan Ayah</th>
            <th>Bobot Pendapatan Ayah</th>
            <th>Pekerjaan Ibu</th>
            <th>Pendapatan Ibu</th>
            <th>Bobot Pendapatan Ibu</th>
            <th>Jumlah Saudara</th>
            <th>Bobot Jumlah Saudara</th>
            <th>Jarak Rumah</th>
            <th>Bobot Jarak Rumah</th>
            <th>Nilai Akedemik</th>
            <th>Jarak</th>
            <th>Keterangan</th>
          </tr>

          <?php
          $sql1 = mysqli_query($conn, "SELECT * FROM tb_sort ORDER BY jarak ASC, id ASC");
          while ($d = mysqli_fetch_array($sql1)) {
          ?>

            <tr>
              <td><?php echo $d['id'] ?></td>
              <td><?php echo $d['nama'] ?></td>
              <td><?php echo $d['pekerjaan_ayah'] ?></td>
              <td><?php echo $d['pendapatan_ayah'] ?></td>
              <td><?php echo $d['bobot_pendapatan_ayah'] ?></td>
              <td><?php echo $d['pekerjaan_ibu'] ?></td>
              <td><?php echo $d['pendapatan_ibu'] ?></td>
              <td><?php echo $d['bobot_pendapatan_ibu'] ?></td>
              <td><?php echo $d['jumlah_saudara'] ?></td>
              <td><?php echo $d['bobot_saudara'] ?></td>
              <td><?php echo $d['jarak_rumah'] ?></td>
              <td><?php echo $d['bobot_jarak'] ?></td>
              <td><?php echo $d['prestasi_akedemik'] ?></td>
              <td><?php echo $d['jarak'] ?></td>
              <td><?php if ($d['keterangan'] == 1) {
                    echo 'Mendapatkan Bantuan';
                  } else {
                    echo 'Tidak Mendapatkan Bantuan';
                  } ?></td>
            </tr>
          <?php } ?>
        </thead>
      </table>
    </div>


    <?php
          include '../connection.php';
          $sql = mysqli_query($conn, "SELECT id, jarak, keterangan, COUNT(IF(keterangan='1',1,NULL))AS mendapatkan, COUNT(IF(keterangan='0',1,NULL)) AS tidakmendapatkan, COUNT(*) AS kesimpulan FROM tb_sort GROUP BY keterangan HAVING(COUNT(kesimpulan)>0)");

          $hasilmendapatkan = '';
          $hasiltidakmendapatkan = '';
          $katmendapatkan = '';
          $kattidakmendapatkan = '';
          $kategori = '';
          $jumlahmendapatkan = '';
          $jumlahtidakmendapatkan = '';

          while ($data = mysqli_fetch_array($sql)) {
            $keterangan[] = $data['keterangan'];
            $mendapatkan[] = $data['mendapatkan'];
            $tidakmendapatkan[] = $data['tidakmendapatkan'];
            $kesimpulan[] = $data['kesimpulan'];
            $d = $data['mendapatkan'];
            $e = $data['tidakmendapatkan'];
          }

          if ($kesimpulan[0] == $e && $keterangan[0] == '0') {
            $kategori = 'Tidak Mendapatkan Bantuan';
          } elseif ($kesimpulan[0] == $d && $keterangan[0] == '1') {
            $kategori = 'Mendapatkan Bantuan';
          } elseif ($kesimpulan[0] > $kesimpulan[1] && $keterangan[0] == '1') {
            $kategori = 'Mendapatkan Bantuan';
          } elseif ($kesimpulan[0] > $kesimpulan[1] && $keterangan[0] == '0') {
            $kategori = 'Tidak Mendapatkan Bantuan';
          } elseif ($kesimpulan[1] > $kesimpulan[0] && $keterangan[1] == '1') {
            $kategori = 'Mendapatkan Bantuan';
          } elseif ($kesimpulan[1] > $kesimpulan[0] && $keterangan[1] == '0') {
            $kategori = 'Tidak Mendapatkan Bantuan';
          } elseif ($kesimpulan[0] == $kesimpulan[1]) {
            $kategori = 'DIPERTIMBANGKAN';
          } else {
            $kategori = '';
          }

          if ($d > $e && $keterangan[0] == '1') {
            $jumlahlolos = $d;
            $jumlahtidaklolos = '0';
          } elseif ($e > $d && $keterangan[0] == '0') {
            $jumlahlolos = '0';
            $jumlahtidaklolos = $e;
          } elseif ($kesimpulan[0] > $kesimpulan[1] && $keterangan[0] == '1') {
            $jumlahlolos = $kesimpulan[0];
            $jumlahtidaklolos = $kesimpulan[1];
          } elseif ($kesimpulan[0] > $kesimpulan[1] && $keterangan[0] == '0') {
            $jumlahlolos = $kesimpulan[1];
            $jumlahtidaklolos = $kesimpulan[0];
          } elseif ($kesimpulan[1] > $kesimpulan[0] && $keterangan[1] == '1') {
            $jumlahlolos = $kesimpulan[1];
            $jumlahtidaklolos = $kesimpulan[0];
          } elseif ($kesimpulan[1] > $kesimpulan[0] && $keterangan[1] == '0') {
            $jumlahlolos = $kesimpulan[0];
            $jumlahtidaklolos = $kesimpulan[1];
          } elseif ($kesimpulan[0] == $kesimpulan[1]) {
            $jumlahlolos = $kesimpulan[0];
            $jumlahtidaklolos = $kesimpulan[1];
          } else {
            $jumlahlolos = '';
            $jumlahtidaklolos = '';
          }

          echo "<center>
    <h2>Nilai Parameter K = $k </h2>
    <h5>Jumlah Menerima Bantuan = <b> $jumlahlolos </b><br></h5>
    <h5>Jumlah Tidak Menerima Bantuan = <b>$jumlahtidaklolos</b></h5>
    <h4>Jadi, Dari Hasil Perhitungan K-Nearest Neighbor, Status Calon Siswa Yang Memperoleh Bantuan adalah <b> $kategori</b></h4>;
    </center>";

          mysqli_query($conn, "UPDATE tb_hasil SET nama = '$nama', pekerjaan_ayah = '$pekerjaanayah', pendapatan_ayah = '$pendapatanayah', bobot_pendapatan_ayah = '$bobotpendapatanayah',pekerjaan_ibu = '$pekerjaanibu',pendapatan_ibu = '$pendapatanibu',bobot_pendapatan_ibu = '$bobotpendapatanibu', jumlah_saudara = '$jumlahsaudara',bobot_saudara = '$bobotsaudara',prestasi_akedemik = '$prestasiakedemik',keterangan = '$kategori' WHERE nis = '$nis'");

    ?>

    <h1 style="margin-top: 100px;">Rincian Perhitungan : </h1>
    <div class="text-center">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Bobot Pendapatan Ayah</th>
              <th>Bobot Pendapatan Ibu</th>
              <th>Bobot Saudara</th>
              <th>Bobot Jarak</th>
              <th>Prestasi Akedemik</th>
              <th>Jarak</th>
              <th>Keterangan</th>
            </tr>

            <?php
            $sql1 = mysqli_query($conn, "SELECT * FROM tb_temp ORDER BY jarak ASC, id ASC");
            while ($ab = mysqli_fetch_array($sql1)) {
            ?>
              <tr>
                <td><?php echo $ab['id'] ?></td>
                <td><?php echo $ab['nama'] ?></td>
                <td><?php echo $ab['bobot_pendapatan_ayah'] ?></td>
                <td><?php echo $ab['bobot_pendapatan_ibu'] ?></td>
                <td><?php echo $ab['bobot_saudara'] ?></td>
                <td><?php echo $ab['bobot_jarak'] ?></td>
                <td><?php echo $ab['prestasi_akedemik'] ?></td>
                <td><?php echo $ab['jarak'] ?></td>
                <td><?php if ($ab['keterangan'] == 1) {
                      echo 'Mendapatkan Bantuan';
                    } else {
                      echo 'Tidak Mendapatkan Bantuan';
                    } ?></td>
              </tr>
            <?php } ?>
          </thead>
        </table>
      </div>

      <button type="button" class="btn btn-primary" name="button" onclick="window.location.href='hasil_klasifikasi.php'">Lihat Hasil Klasifikasi</button>

      <br><br><br><br>

    </div>
  <?php } ?> -->
</div>

</div>
<?php
require 'template/footer.php'; ?>