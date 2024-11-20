<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
include 'db.php';
?>

<?php include 'include/header.php'; ?>
<div class="container card p-3 mt-4">
    <h2 class="card-header">Hasil Rekapitulasi Suara</h2>
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th>Nomor TPS</th>
                <th>Nama Saksi</th>
                <th>01 <br> Citra P - Ino D</th>
                <th>02 <br> U. Endin - Dadang S</th>
                <th>Suara Tidak Sah</th>
                <th>Total Suara</th>
                <th>Waktu Input</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            $query = "SELECT * FROM hasil_suara ORDER BY created_at DESC";
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                $total_suara = $row['kandidat1'] + $row['kandidat2'] + $row['suara_tidak_sah'];
                echo "<tr>
                        <td>{$row['nomor_tps']}</td>
                        <td>{$row['nama_saksi']}</td>
                        <td>{$row['kandidat1']}</td>
                        <td>{$row['kandidat2']}</td>
                        <td>{$row['suara_tidak_sah']}</td>
                        <td>$total_suara</td>
                        <td>{$row['created_at']}</td>
                        <td>
                            <a href='edit_suara.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus_suara.php?action=delete&id={$row['id']}' class='btn btn-danger btn-sm'>Hapus</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
    <table class="table table-bordered">
        <thead class="text-center">
            <th>Total Suara 01</th>
            <th>Total Suara 02</th>
            <th>Total Suara Tidak Sah</th>
        </thead>
        <tbody class="text-center">
            <?php
            // Query untuk menjumlahkan suara dari seluruh TPS
            $query = "SELECT 
                    SUM(kandidat1) AS total_kandidat1, 
                    SUM(kandidat2) AS total_kandidat2, 
                    SUM(suara_tidak_sah) AS total_tidak_sah 
                  FROM hasil_suara";

            $result = $conn->query($query);

            // Menampilkan hasil total
            if ($result && $row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['total_kandidat1']}</td>
                    <td>{$row['total_kandidat2']}</td>
                    <td>{$row['total_tidak_sah']}</td>
                  </tr>";
            } else {
                echo "<tr>
                    <td colspan='3'>Data tidak tersedia</td>
                  </tr>";
            }
            ?>
        </tbody>
    </table>

    </table>
</div>
<?php include 'include/footer.php'; ?>