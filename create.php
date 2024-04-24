<?php
require_once 'top.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Nilai Mahasiswa</h1>
    <a href="index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="store.php" method="POST">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>NIM</td>
                <td><input class="form-control" type="text" name="nim"></td>
              </tr>
              <tr>
                <td>Kode MK</td>
                <td><input class="form-control" type="text" name="kode_mk"></td>
              </tr>
              <tr>
                <td>Nilai</td>
                <td><input class="form-control" type="number" name="nilai"></td>
              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
                </td>
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