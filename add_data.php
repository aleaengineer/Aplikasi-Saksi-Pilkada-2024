<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>

<?php include 'include/header.php'; ?>
    <div class="container card col-md-8 mt-4 p-3">
        <h2 class="card-header">Tambah Data Saksi</h2>
        <form action="process.php?action=add" method="POST" enctype="multipart/form-data" class="card-body">
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" name="nik" id="nik" class="form-control" required maxlength="16">
            </div>
            <div class="mb-3">
                <label for="nomor_tps" class="form-label">Nomor TPS</label>
                <input type="number" name="nomor_tps" id="nomor_tps" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="desa" class="form-label">Desa</label>
                <input type="text" name="desa" id="desa" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" name="kecamatan" id="kecamatan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kabupaten" class="form-label">Kabupaten</label>
                <input type="text" name="kabupaten" id="kabupaten" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Foto</label>
                <input type="file" name="gambar" id="gambar" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Lokasi (Geolocation)</label>
                <input type="text" id="latitude" name="latitude" class="form-control mb-2" placeholder="Latitude"
                    readonly required>
                <input type="text" id="longitude" name="longitude" class="form-control" placeholder="Longitude" readonly
                    required>
                <button type="button" class="btn btn-secondary mt-2" id="getLocation">Dapatkan Lokasi</button>
            </div>
            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
        </form>
    </div>

    <script>
        document.getElementById('getLocation').addEventListener('click', function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    document.getElementById('latitude').value = position.coords.latitude;
                    document.getElementById('longitude').value = position.coords.longitude;
                }, function (error) {
                    alert('Gagal mendapatkan lokasi: ' + error.message);
                });
            } else {
                alert('Geolocation tidak didukung oleh browser Anda.');
            }
        });
    </script>
<?php include 'include/footer.php'; ?>