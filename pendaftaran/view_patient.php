<?php

include '../koneksi.php';


$query = "SELECT * FROM person";
$result = mysqli_query($mysqli, $query);


if (!$result) {
    die('Query failed: ' . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patients</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
    <link href="../assets/style.css" rel="stylesheet"/>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Daftar Pasien</h2>
    <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Back</button>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>PersonKey</th>
                <th>No Rekam Medis</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Agama</th>
                <th>Golongan Darah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $row['PersonKey'] . "</td>
                        <td>" . $row['NoRekamMedis'] . "</td>
                        <td>" . $row['Nama'] . "</td>
                        <td>" . ($row['Gender'] == 'l' ? 'Laki-Laki' : 'Perempuan') . "</td>
                        <td>" . $row['DateOfBirth'] . "</td>
                        <td>" . $row['PlaceofBirth'] . "</td>
                        <td>" . $row['HomeAddress'] . "</td>
                        <td>" . $row['HomePhone'] . "</td>
                        <td>" . $row['ReligionKey'] . "</td>
                        <td>" . $row['GolDar'] . "</td>
                        <td>
                            <a href='edit.php?id=" . $row['PersonKey'] . "' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete.php?id=" . $row['PersonKey'] . "' class='btn btn-danger btn-sm'>Delete</a>
                            <a href='detail.php?PersonKey=" . $row['PersonKey'] . "' class='btn btn-info btn-sm'>Detail</a>
                        </td>

                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<script src="../assets/bootstrap-4.6.2/js/bootstrap.min.js"></script>
</body>
</html>
