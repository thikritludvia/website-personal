<?php
include_once("../koneksi.php");


$query = "SELECT billingpenjaminheader.*, person.Nama 
FROM billingpenjaminheader 
LEFT JOIN person ON billingpenjaminheader.PersonKeyPatient = person.PersonKey;
";
$result = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Billing</title>
    
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
    <link href="../assets/style.css" rel="stylesheet"/>
</head>
<body>
    <div class="container mt-4">
        <h3 class="text-center mb-4 text-primary">Data Billing Penjamin Header</h3>
        <table class="table table-striped table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No Billing</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Keluar</th>
                    <th>Total Tagihan</th>
                    <th>Canceled Reason</th>
                    <th>Kelas Harga</th>
                    <th>Dokter Key</th>
                    <th>Closed Date</th>
                    <th>Closed By</th>
                </tr>
            </thead>
            <tbody class="bg-light"> 
                <?php
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><a href='billingpenjaminsubheader.php?NoBilling=" . $row['NoBilling'] . "'>" . $row['NoBilling'] . "</a></td>";
                    echo "<td>" . ($row['Nama']) . "</td>";
                    echo "<td>" . ($row['TanggalMasuk']) . "</td>";
                    echo "<td>" . ($row['TanggalKeluar']) . "</td>";
                    echo "<td>" . ($row['TotalTagihan']) . "</td>";
                    echo "<td>" . ($row['CanceledReason']) . "</td>";
                    echo "<td>" . ($row['KelasHarga']) . "</td>";
                    echo "<td>" . ($row['DokterKey']) . "</td>";
                    echo "<td>" . ($row['ClosedDate']) . "</td>";
                    echo "<td>" . ($row['ClosedBy']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
         <div class="text-center mt-4">
            <a href="http://localhost/222220047/index.php" class="btn btn-secondary">Back</a>
        </div>
    </div>
</body>
</html>
