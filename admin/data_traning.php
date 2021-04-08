<?php require 'template/header.php';

$data = query("SELECT * FROM tb_data_training");

?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Training</h1>
  <p class="mb-4">Data Training adalah data yang digunakan sebagai patokan dalam menentukan data baru.
  </p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?= base_url('admin/tambah_data.php') ?>" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
      </a>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Pekerjaan Ayah</th>
                <!-- <th>Penghasilan Ayah</th> -->
                <th>Pekerjaan Ibu</th>
                <!-- <th>Penghasilan Ibu</th> -->
                <th>Jumlah Saudara</th>
                <th>Jarak ke Sekolah</th>
                <th>Prestasi Akedemik</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $a = 1;

              foreach ($data as $b) : ?>

                <?php
                if ($b['prestasi_akedemik'] >= 60 && $b['prestasi_akedemik'] <= 70) {
                  $nilai = 'Cukup';
                } elseif ($b['prestasi_akedemik'] >= 71 && $b['prestasi_akedemik'] <= 79) {
                  $nilai = 'Baik';
                } elseif ($b['prestasi_akedemik'] >= 80 && $b['prestasi_akedemik'] <= 100) {
                  $nilai = 'Sangat Baik';
                } else {
                  $nilai = 'Kurang';
                }
                ?>

                <?php
                if ($b['keterangan'] == '1') {
                  $ket = 'Mendapatkan Bantuan';
                  $cor = 'Terdampak Covid-19';
                } else {
                  $ket = 'Tidak Mendapatkan Bantuan';
                  $cor = 'Tidak Terdampak Covid-19';
                }
                ?>

                <tr>
                  <td><?= $a ?></td>
                  <td><?= $b['nama'] ?></td>
                  <td><?= $b['pekerjaan_ayah'] ?></td>
                  <td><?= $b['pekerjaan_ibu'] ?></td>
                  <td><?= $b['jumlah_saudara'] ?> Orang</td>
                  <td><?= $b['jarak_rumah'] ?> Kilometer</td>
                  <td><?= $nilai ?></td>
                  <td><?= $ket ?></td>
                  <td>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal<?= $b['id'] ?>">
                      <i class="fas fa-eye"></i>
                    </button>
                    <a class="btn btn-primary btn-sm" href="edit_data.php?id=<?= $b["id"]; ?>">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="proses_hapus.php?id=<?= $b["id"]; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Training Siswa');">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?= $b['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Data Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nama Siswa:</label>
                                <input type="text" class="form-control" id="recipient-name" value="<?= $b['nama'] ?>" readonly>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="row">
                                <div class="form-group col-sm-6">
                                  <label for="recipient-name" class="col-form-label">Pekerjaan Ayah :</label>
                                  <input type="text" class="form-control" id="recipient-name" value="<?= $b['pekerjaan_ayah'] ?>" readonly>
                                </div>
                                <div class="form-group col-sm-6">
                                  <label for="recipient-name" class="col-form-label">Pendapatan Ayah :</label>
                                  <input type="text" class="form-control" id="recipient-name" value="Rp. <?= $b['pendapatan_ayah'] ?>" readonly>
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div class="row">
                                <div class="form-group col-sm-6">
                                  <label for="recipient-name" class="col-form-label">Pekerjaan Ibu :</label>
                                  <input type="text" class="form-control" id="recipient-name" value="<?= $b['pekerjaan_ibu'] ?>" readonly>
                                </div>
                                <div class="form-group col-sm-6">
                                  <label for="recipient-name" class="col-form-label">Pendapatan Ibu :</label>
                                  <input type="text" class="form-control" id="recipient-name" value="Rp. <?= $b['pendapatan_ibu'] ?>" readonly>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Jumlah Saudara Kandung :</label>
                                <input type="text" class="form-control" id="recipient-name" value="<?= $b['jumlah_saudara'] ?> Orang" readonly>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Jarak Rumah Ke Sekolah :</label>
                                <input type="text" class="form-control" id="recipient-name" value="<?= $b['jarak_rumah'] ?> Kilometer" readonly>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Prestasi Akedemik :</label>
                                <input type="text" class="form-control" id="recipient-name" value="<?= $nilai ?>" readonly>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Status :</label>
                                <input type="text" class="form-control" id="recipient-name" value="<?= $cor ?>" readonly>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Keterangan :</label>
                                <input type="text" class="form-control" id="recipient-name" value="<?= $ket ?>" readonly>
                              </div>
                            </div>

                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- modal -->
              <?php
                $a++;
              endforeach;
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>





  <!-- /.container-fluid -->
</div>
<?php require 'template/footer.php' ?>