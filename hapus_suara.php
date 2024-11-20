<?php
session_start();
include 'db.php';

$action = $_GET['action'];

if ($action === 'delete') {
    $id = $_GET['id'];
    $query = "DELETE FROM hasil_suara WHERE id = $id";

    if ($conn->query($query)) {
        header('Location: hasil.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>