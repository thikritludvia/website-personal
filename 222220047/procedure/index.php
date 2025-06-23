<?php 
    
    include_once("../koneksi.php");

    
    $result = mysqli_query($mysqli,
    "SELECT procedureorder.Tanggal, procedureorder.PersonKeyPasien, procedureorder.NoProcedure, 
    procedureorder.NoEpisode, person_pasien.Nama AS NamaPasien, procedureorder.PersonKeyDokter, 
    person_dokter.Nama AS NamaDokter, procedureorder.DiagnosisAwal, procedureorder.ICD10, 
    procedureorder.TotalHarga, procedureorder.KodeICD9CM, procedureorder.EnteredBy, 
    procedureorder.EnteredDate 
    FROM procedureorder 
    JOIN person AS person_pasien ON procedureorder.PersonKeyPasien = person_pasien.PersonKey 
    JOIN person AS person_dokter ON procedureorder.PersonKeyDokter = person_dokter.PersonKey"
    );

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prosedur</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center text-primary">Daftar Prosedur</h2>
        <table class="table table-striped table-bordered mt-4">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No. Prosedur</th>
                    <th>No. Billing</th>
                    <th>Tanggal</th>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Total Harga</th>
                    <th>Entered By</th>
                    <th>EnteredDate</th>
                </tr>
            </thead>

            <tbody class="bg-light">
                <?php
                
                while ($procedureorder = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>
                        <a href='proceduredetail.php?NoProcedure=".$procedureorder['NoProcedure']."'>".$procedureorder['NoProcedure']."</a>
                        </td>";
                    echo "<td>".$procedureorder['NoEpisode']."</td>";
                    echo "<td>".$procedureorder['Tanggal']."</td>";
                    echo "<td>".$procedureorder['NamaPasien']."</td>";  
                    echo "<td>".$procedureorder['NamaDokter']."</td>";
                    echo "<td>".$procedureorder['TotalHarga']."</td>";  
                    echo "<td>".$procedureorder['EnteredBy']."</td>";  
                    echo "<td>".$procedureorder['EnteredDate']."</td>";   
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
