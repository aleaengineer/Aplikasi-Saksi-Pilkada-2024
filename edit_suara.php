<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
include 'db.php';

$id = $_GET['id'];
$query = "SELECT * FROM hasil_suara WHERE id = $id";
$result = $conn->query($query);
$data = $result->fetch_assoc();
?>

<?php include 'include/header.php'; ?>
    <div class="container card mt-4">
        <h2 class="card-header mt-4">Edit Data Suara</h2>
        <form action="process.php?action=edit_suara" method="POST" class="card-body">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="mb-3">
                <label for="nomor_tps" class="form-label">Nomor TPS</label>
                <input type="number" name="nomor_tps" id="nomor_tps" class="form-control" value="<?= $data['nomor_tps'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_saksi" class="form-label">Nama Saksi</label>
                <input type="text" name="nama_saksi" id="nama_saksi" class="form-control" value="<?= $data['nama_saksi'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="kandidat1" class="form-label">Citra P - Ino D</label>
                <input type="number" name="kandidat1" id="kandidat1" class="form-control" value="<?= $data['kandidat1'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="kandidat2" class="form-label">U. Endin - Dadang S</label>
                <input type="number" name="kandidat2" id="kandidat2" class="form-control" value="<?= $data['kandidat2'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="suara_tidak_sah" class="form-label">Suara Tidak Sah</label>
                <input type="number" name="suara_tidak_sah" id="suara_tidak_sah" class="form-control" value="<?= $data['suara_tidak_sah'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
<?php include 'include/footer.php'; ?>