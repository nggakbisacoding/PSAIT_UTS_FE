<?php
require_once 'top.php';
$curl= curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//Pastikan sesuai dengan alamat endpoint dari REST API di UBUNTU, 
curl_setopt($curl, CURLOPT_URL, 'http://localhost/sait_project_api/rest_api.php');
$res = curl_exec($curl);
$json = json_decode($res, true);
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Mahasiswa</h1>
    <form action="search.php" method="GET">
      <input type="text" class="form-control" name="nim" placeholder="Cari NIM" required>
      <input type="submit" class="btn btn-primary" value="Cari">
    </form>
    <a href="create.php" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr class="text-center">
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Tanggal Lahir</th>
                  <th>Kode MK</th>
                  <th>Nama MK</th>
                  <th>SKS</th>
                  <th>Nilai</th>
                  <th style="width: 150">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                for ($i = 0; $i < count($json["data"]); $i++){
                ?>

                  <tr>
                    <td><?= $json["data"][$i]['nim'] ?></td>
                    <td><?= $json["data"][$i]['nama'] ?></td>
                    <td><?= $json["data"][$i]['alamat'] ?></td>
                    <td><?= $json["data"][$i]['tanggal_lahir'] ?></td>
                    <td><?= $json["data"][$i]['kode_mk'] ?></td>
                    <td><?= $json["data"][$i]['nama_mk'] ?></td>
                    <td><?= $json["data"][$i]['sks'] ?></td>
                    <td><?= $json["data"][$i]['nilai'] ?></td>
                    <td>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?nim=<?= $json["data"][$i]['nim']?>&kode_mk=<?=$json["data"][$i]['kode_mk']?>">
                        <i class="fas fa-trash fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-info" href="edit.php?nim=<?= $json["data"][$i]['nim']?>&kode_mk=<?=$json["data"][$i]['kode_mk']?>">
                        <i class="fas fa-edit fa-fw"></i>
                      </a>
                    </td>
                  </tr>

                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>

<?php
require_once 'bottom.php';
?>
<!-- Page Specific JS File -->
<script src="../assets/js/page/modules-datatables.js"></script>