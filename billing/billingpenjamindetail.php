<?php 
include_once("../koneksi.php"); 


$NoReferensi = $_GET['NoReferensi'];


$query = "SELECT 
            billingpenjamindetail.IdBaris, 
            billingpenjamindetail.NoReferensi, 
            billingpenjamindetail.KodeItem, 
            billingpenjamindetail.KodeBaris, 
            billingpenjamindetail.Harga, 
            billingpenjamindetail.Jumlah, 
            billingpenjamindetail.TotalHarga, 
            billingpenjamindetail.StatusEksekusi, 
            billingpenjamindetail.LokasiEksekusi, 
            itemmaster.NamaItem 
          FROM 
            billingpenjamindetail 
          JOIN 
            itemmaster ON billingpenjamindetail.KodeItem = itemmaster.KodeItem 
          WHERE 
            billingpenjamindetail.NoReferensi = '$NoReferensi'";

$result = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Penjamin Detail</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center text-primary">Billing Penjamin Detail</h2>
        <h4 class="text-center">No. Nota: <?php echo $NoReferensi; ?></h4>
        <table class="table table-striped table-bordered mt-4">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>Nama Item</th>
                    <th>Kode Item</th>
                    <th>Kode Baris</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Status Eksekusi</th>
                    <th>Lokasi Eksekusi</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['IdBaris']}</td>
                            <td>" .($row['NamaItem']) . "</td>
                            <td>" .($row['KodeItem']) . "</td>
                            <td>" .($row['KodeBaris']) . "</td>
                            <td>" .($row['Harga']) . "</td>
                            <td>" .($row['Jumlah']) . "</td>
                            <td>" .($row['TotalHarga']) . "</td>
                            <td>" .($row['StatusEksekusi']) . "</td>
                            <td>" .($row['LokasiEksekusi']) . "</td>
                          </tr>";
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
 