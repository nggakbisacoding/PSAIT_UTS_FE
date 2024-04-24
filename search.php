<?php
require_once 'top.php';
$nim = $_GET['nim'];
$curl= curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//Pastikan sesuai dengan alamat endpoint dari REST API di UBUNTU, 
curl_setopt($curl, CURLOPT_URL, 'http://localhost/sait_project_api/rest_api.php?nim='.$nim);
$res = curl_exec($curl);
$json = json_decode($res, true);
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Nilai Mahasiswa <?= $json["data"][0]['nama']?></h1>
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
                  <th>Nilai</th>
                </tr>
              </thead>
              <tbody>
                <?php
                for ($i = 0; $i < count($json["data"]); $i++){
                ?>

                  <tr>
                    <td><?= $json["data"][$i]['nim'] ?></td>
                    <td><?= $json["data"][$i]['nama'] ?></td>
                    <td><?= $json["data"][$i]['nilai'] ?></td>
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