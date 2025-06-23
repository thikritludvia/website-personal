<?php 
    include_once("../koneksi.php");

    $NoTransaksi=$_GET['NoTransaksi'];

    $result = mysqli_query($mysqli,
    "SELECT
    stockopnamedetail.NoLine, stockopnamedetail.NoTransaksi, stockopnamedetail.KodeItem,
    itemmaster.NamaItem, stockopnamedetail.BatchNumber, stockopnamedetail.ExpiredDate,
    stockopnamedetail.RealStock, stockopnamedetail.EnteredBy, stockopnamedetail.EnteredDate,
    stockopnamedetail.UpdateBy, stockopnamedetail.UpdateDate, stockopnamedetail.IdKlasifikasi,
    stockopnamedetail.ReffNoTransaksi
    FROM
    stockopnamedetail, itemmaster
    where
    stockopnamedetail.NoTransaksi = '$NoTransaksi' AND stockopnamedetail.KodeItem = itemmaster.KodeItem");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resep Detail</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center text-primary">Stok Opname Detail</h2>
        <h4 class="text-center"><?php echo "No.Nota Stock Opname = $NoTransaksi"; ?></h4>
        <table class="table table-striped table-bordered mt-4">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Kode Item</th>
                    <th>Nama Item</th>
                    <th>Batch Number</th>
                    <th>Real Stock </th>
                    <th>Entered Date</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                <?php
                while ($stockopnamedetail = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $stockopnamedetail['KodeItem'] . "</td>";
                    echo "<td>" . $stockopnamedetail['NamaItem'] . "</td>";
                    echo "<td>" . $stockopnamedetail['BatchNumber'] . "</td>";
                    echo "<td>" . $stockopnamedetail['RealStock'] . "</td>";
                    echo "<td>" . $stockopnamedetail['EnteredDate'] . "</td>";
                    echo "</tr>";
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
 
