<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>

<?php include 'include/header.php'; ?>
<div class="container card">
    <h2 class="mt-4">Dashboard</h2>
    <a href="add_data.php" class="btn btn-success btn-sm my-3">Tambah Data</a>
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th>Nama Lengkap</th>
                <th>NIK</th>
                <th>Nomor TPS</th>
                <th>Alamat</th>
                <th>Gambar</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            include 'db.php';
            $query = "SELECT * FROM data_saksi ORDER BY created_at DESC";
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['nama_lengkap']}</td>
                        <td>{$row['nik']}</td>
                        <td>{$row['nomor_tps']}</td>
                        <td>{$row['alamat']}, {$row['desa']}, {$row['kecamatan']}, {$row['kabupaten']}</td>
                        <td><img src='uploads/{$row['gambar']}' alt='' width='50'></td>
                        <td>{$row['latitude']}</td>
                        <td>{$row['longitude']}</td>
                        <td>
                            <a href='edit_data.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='process.php?action=delete&id={$row['id']}' class='btn btn-danger btn-sm'>Hapus</a>
                        </td>
                    </tr>";
                }
            ?>
        </tbody>
    </table>
</div>
<?php include 'include/footer.php'; ?>