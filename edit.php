<?php
require_once 'top.php';
$nim = $_GET['nim'];
$curl= curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
curl_setopt($curl, CURLOPT_URL, 'http://localhost/sait_project_api/rest_api.php?nim='.$nim.'&kode_mk='.$_GET['kode_mk']);
$res = curl_exec($curl);
$json = json_decode($res, true);
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Nilai Mahasiswa</h1>
    <a href="index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="update.php" method="post">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>NIM</td>
                  <td><input class="form-control" type="text" required value="<?= $json["data"][0]['nim'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Kode MK</td>
                  <td><input class="form-control" type="text" required value="<?= $json["data"][0]['kode_mk'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Nilai</td>
                  <td><input class="form-control" type="number" name="nilai" required value="<?= $json["data"][0]['nilai'] ?>"></td>
                <tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>
           </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once 'bottom.php';
?>