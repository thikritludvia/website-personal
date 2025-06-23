<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query_delete = "DELETE FROM person WHERE PersonKey = '$id'";

    if (mysqli_query($mysqli, $query_delete)) {
        header('Location: view_patient.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
} else {
    die('No ID provided!');
}
?>
