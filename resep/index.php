<?php
include_once("../koneksi.php");

$result = mysqli_query($mysqli, "
            SELECT 
                reseporder.NoResep, 
                reseporder.NoEpisode,
                reseporder.Tanggal,
                personsinpartners.MedicalRecordNumber,
                reseporder.TotalHarga,
                reseporder.PaymentMethode,
                person.Nama AS NamaPasien,
                billingpenjaminheader.namadokter AS NamaDokter
            FROM 
                personsinpartners, reseporder, person, billingpenjaminheader
            WHERE 
                reseporder.PersonKeyPasien = personsinpartners.PersonKey 
                AND reseporder.PersonKeyPasien = person.PersonKey 
                AND reseporder.PersonKeyDokter = billingpenjaminheader.DokterKey
");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resep</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center text-primary">Daftar Resep Pasien</h2>
        <table class="table table-striped table-bordered mt-4">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No. Resep</th>
                    <th>No. Billing</th>
                    <th>Tanggal</th>
                    <th>No. RM</th>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                <?php
                while ($reseporder = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>
                        <a href ='reseporderdetail.php?NoResep=".$reseporder['NoResep']."'>".$reseporder['NoResep']."</a>
                        </td>";
                    echo "<td>".$reseporder['NoEpisode']."</td>";
                    echo "<td>".$reseporder['Tanggal']."</td>";
                    echo "<td>".$reseporder['MedicalRecordNumber']."</td>";
                    echo "<td>".$reseporder['NamaPasien']."</td>";  
                    echo "<td>".$reseporder['NamaDokter']."</td>"; 
                    echo "<td>".$reseporder['TotalHarga']."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="text-center mt-4">
            <a href="http://localhost/222220047/" class="btn btn-secondary">Back</a>
        </div>
    </div>
</body>
</html>





