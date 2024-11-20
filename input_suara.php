<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
include 'db.php';
?>

<?php include 'include/header.php'; ?>
    <div class="container card col-md-8 p-3 mt-4">
        <h2 class="card-header">Form Input Hasil Suara</h2>
        <form action="process.php?action=input_suara" method="POST" class="card-body" >
            <div class="mb-3">
                <label for="nomor_tps" class="form-label">Nomor TPS</label>
                <input type="number" name="nomor_tps" id="nomor_tps" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama_saksi" class="form-label">Nama Saksi</label>
                <input type="text" name="nama_saksi" id="nama_saksi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kandidat1" class="form-label">Citra P - Ino D</label>
                <input type="number" name="kandidat1" id="kandidat1" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kandidat2" class="form-label">U. Endin - Dadang S</label>
                <input type="number" name="kandidat2" id="kandidat2" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="suara_tidak_sah" class="form-label">Suara Tidak Sah</label>
                <input type="number" name="suara_tidak_sah" id="suara_tidak_sah" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
        </form>
    </div>
<?php include 'include/footer.php'; ?>