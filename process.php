<?php
session_start();
include 'db.php';

// Pastikan parameter 'action' ada sebelum digunakan
$action = isset($_GET['action']) ? $_GET['action'] : null;

if ($action === 'add') {
    $nama_lengkap = $_POST['nama_lengkap'];
    $nik = $_POST['nik'];
    $nomor_tps = $_POST['nomor_tps'];
    $alamat = $_POST['alamat'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Validasi dan upload gambar
    $gambar = $_FILES['gambar']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($gambar);

    // Periksa apakah file adalah gambar
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($file_type, $allowed_types) && move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO data_saksi (nama_lengkap, nik, nomor_tps, alamat, desa, kecamatan, kabupaten, latitude, longitude, gambar)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssssssss', $nama_lengkap, $nik, $nomor_tps, $alamat, $desa, $kecamatan, $kabupaten, $latitude, $longitude, $gambar);

        if ($stmt->execute()) {
            header('Location: dashboard.php');
        } else {
            echo "Error: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Gagal mengunggah gambar atau format tidak didukung.";
    }
}

if ($action === 'delete') {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM data_saksi WHERE id = ?");
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header('Location: dashboard.php');
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
}

if ($action === 'edit') {
    $id = $_POST['id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nik = $_POST['nik'];
    $nomor_tps = $_POST['nomor_tps'];
    $alamat = $_POST['alamat'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];

    $stmt = $conn->prepare("UPDATE data_saksi 
                            SET nama_lengkap = ?, nik = ?, nomor_tps = ?, alamat = ?, desa = ?, kecamatan = ?, kabupaten = ?
                            WHERE id = ?");
    $stmt->bind_param('sssssssi', $nama_lengkap, $nik, $nomor_tps, $alamat, $desa, $kecamatan, $kabupaten, $id);

    if ($stmt->execute()) {
        header('Location: dashboard.php');
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
}

if ($action === 'edit_suara') {
    $id = $_POST['id']; // Pastikan variabel $id ada
    $nomor_tps = $_POST['nomor_tps'];
    $nama_saksi = $_POST['nama_saksi'];
    $kandidat1 = $_POST['kandidat1'];
    $kandidat2 = $_POST['kandidat2'];
    $suara_tidak_sah = $_POST['suara_tidak_sah'];

    $stmt = $conn->prepare("UPDATE hasil_suara 
                            SET nomor_tps = ?, nama_saksi = ?, kandidat1 = ?, kandidat2 = ?, suara_tidak_sah = ?
                            WHERE id = ?");
    $stmt->bind_param('sssssi', $nomor_tps, $nama_saksi, $kandidat1, $kandidat2, $suara_tidak_sah, $id);

    if ($stmt->execute()) {
        header('Location: hasil.php');
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
}

if ($action === 'input_suara') {
    $nomor_tps = $_POST['nomor_tps'];
    $nama_saksi = $_POST['nama_saksi'];
    $kandidat1 = $_POST['kandidat1'];
    $kandidat2 = $_POST['kandidat2'];
    $suara_tidak_sah = $_POST['suara_tidak_sah'];

    $stmt = $conn->prepare("INSERT INTO hasil_suara (nomor_tps, nama_saksi, kandidat1, kandidat2, suara_tidak_sah)
                            VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $nomor_tps, $nama_saksi, $kandidat1, $kandidat2, $suara_tidak_sah);

    if ($stmt->execute()) {
        header('Location: hasil.php');
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
}
?>
