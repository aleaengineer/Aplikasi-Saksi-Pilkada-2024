<?php
include 'db.php';

// Query untuk menghitung total suara masing-masing kandidat dan suara tidak sah
$query = "SELECT 
            SUM(kandidat1) AS total_kandidat1, 
            SUM(kandidat2) AS total_kandidat2, 
            SUM(suara_tidak_sah) AS total_tidak_sah 
          FROM hasil_suara";
$result = $conn->query($query);

// Default data jika tidak ada hasil
$total_kandidat1 = $total_kandidat2 = $total_tidak_sah = 0;

if ($result && $row = $result->fetch_assoc()) {
    $total_kandidat1 = $row['total_kandidat1'];
    $total_kandidat2 = $row['total_kandidat2'];
    $total_tidak_sah = $row['total_tidak_sah'];
}
?>

<?php include 'include/header.php'; ?>
<div class="container col-md-4 mt-2">
    <h2 class="text-center mb-3">Grafik Total Suara Kandidat</h2>
    <canvas id="chartSuara" class="text-white rounded"></canvas>
</div>

<script>
    const ctx = document.getElementById('chartSuara').getContext('2d');
    const chartSuara = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Citra - Ino', 'Ujang - Dadang'], // Label untuk kategori
            datasets: [{
                label: '$labels',
                data: [
                    <?= $total_kandidat1 ?>, 
                    <?= $total_kandidat2 ?>, 
                ], // Data yang diambil dari PHP
                backgroundColor: [
                    'rgb(255, 17, 0)', // Warna untuk Kandidat 01
                    'rgba(0, 183, 255)', // Warna untuk Kandidat 02
                ],
                borderColor: [
                    'rgba(75, 192, 192, 0.1)',
                    'rgba(255, 99, 132, 0.1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true, // Responsif
            maintainAspectRatio: true, // Menjaga aspek rasio
            plugins: {
                legend: {
                    display: true,
                    position: 'top' // Posisi legend di atas grafik
                },
                tooltip: {
                    enabled: true // Tooltip aktif
                }
            },
            hoverOffset: 20, // Menambahkan jarak ketika item dihover (default: 4, bisa disesuaikan)
        }
    });
</script>
<?php include 'include/footer.php'; ?>