<?php
include '../koneksi.php';  


$nama = $_POST['nama'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$place_of_birth = $_POST['place_of_birth'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$religion = $_POST['religion'];
$gol_dar = $_POST['gol_dar'];


$query_last_id = "SELECT MAX(PersonKey) AS last_id FROM person";
$result_last_id = mysqli_query($mysqli, $query_last_id);
$row_last_id = mysqli_fetch_assoc($result_last_id);
$last_id = $row_last_id['last_id'] + 1;  // Mengambil ID terakhir dan menambah 1
$no_rekam_medis = 'RM' . str_pad($last_id, 6, '0', STR_PAD_LEFT);  // Format: RM000001, RM000002, dst.

// Menyimpan data ke tabel person
$query = "INSERT INTO person (Nama, Gender, DateOfBirth, PlaceofBirth, HomeAddress, HomePhone, ReligionKey, GolDar, NoRekamMedis) 
          VALUES ('$nama', '$gender', '$dob', '$place_of_birth', '$address', '$phone', '$religion', '$gol_dar', '$no_rekam_medis')";

if (mysqli_query($mysqli, $query)) {
    // Redirect ke halaman view_patient.php setelah data berhasil disimpan
    header('Location: view_patient.php');
    exit;
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}
?>
