<?php 
include_once("../koneksi.php");

$NoBilling = $_GET['NoBilling'];


$result = mysqli_query($mysqli, "
    SELECT 
        billingpenjaminsubheader.NoReferensi, 
        billingpenjaminsubheader.NoBilling, 
        billingpenjaminsubheader.Tanggal, 
        billingpenjaminsubheader.PersonKeyDokter, 
        billingpenjaminsubheader.EmrTypeKey, 
        billingpenjaminsubheader.ExecutedDate, 
        billingpenjaminsubheader.ExecutedBy, 
        billingpenjaminsubheader.OrderBy, 
        billingpenjaminsubheader.ExecutedStatus, 
        billingpenjaminsubheader.IdLokasiProses,
        billingpenjaminsubheader.TglProses 
    FROM 
        billingpenjaminsubheader 
    WHERE 
        NoBilling = '$NoBilling'
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Penjamin Subheader</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h3 class="text-center mb-4 text-primary">Billing Penjamin Subheader</h3>
        <h4 class="text-center">No. Billing: <?php echo $NoBilling; ?></h4>
        <table class="table table-striped table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No. Nota</th>
                    <th>No. Billing</th>
                    <th>Tanggal</th>
                    <th>Person Key Dokter</th>
                    <th>Emr Type Key</th>
                    <th>Executed Date</th>
                    <th>Executed By</th>
                    <th>Order By</th>
                    <th>Executed Status</th>
                    <th>Id Lokasi Proses</th>
                    <th>Tgl Proses</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                <?php
                while ($billingpenjaminsubheader = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo "<td><a href='billingpenjamindetail.php?NoReferensi=" . $billingpenjaminsubheader['NoReferensi'] . "'>" . $billingpenjaminsubheader['NoReferensi'] . "</a></td>";
                    echo "<td>" . ($billingpenjaminsubheader['NoBilling']) . "</td>";
                    echo "<td>" . ($billingpenjaminsubheader['Tanggal']) . "</td>";
                    echo "<td>" . ($billingpenjaminsubheader['PersonKeyDokter']) . "</td>";
                    echo "<td>" . ($billingpenjaminsubheader['EmrTypeKey']) . "</td>";
                    echo "<td>" . ($billingpenjaminsubheader['ExecutedDate']) . "</td>";
                    echo "<td>" . ($billingpenjaminsubheader['ExecutedBy']) . "</td>";
                    echo "<td>" . ($billingpenjaminsubheader['OrderBy']) . "</td>";
                    echo "<td>" . ($billingpenjaminsubheader['ExecutedStatus']) . "</td>";
                    echo "<td>" . ($billingpenjaminsubheader['IdLokasiProses']) . "</td>";
                    echo "<td>" . ($billingpenjaminsubheader['TglProses']) . "</td>";
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-secondary">Back</a>
        </div>
    </div>
</body>
</html>
