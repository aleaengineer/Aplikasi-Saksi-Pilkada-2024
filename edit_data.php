<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
include 'db.php';

$id = $_GET['id'];
$query = "SELECT * FROM data_saksi WHERE id = $id";
$result = $conn->query($query);
$data = $result->fetch_assoc();
?>

<?php include 'include/header.php'; ?>
    <div class="container">
        <h2 class="mt-4">Edit Data Saksi</h2>
        <form action="process.php?action=edit" method="POST">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $data['nama_lengkap'] ?>" required>
            </div>
            <!-- Tambahkan field lain seperti pada form tambah -->
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
<?php include 'include/footer.php'; ?>