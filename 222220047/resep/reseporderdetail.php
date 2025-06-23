<?php
include_once("../koneksi.php");

$NoResep = $_GET['NoResep'];

$result = mysqli_query($mysqli, "
                        SELECT
                            reseporderdetail.KodeItem, 
                            itemmaster.NamaItem, 
                            reseporderdetail.Jumlah, 
                            reseporderdetail.Harga,
                            reseporderdetail.SubTotal
                        FROM
                            reseporderdetail, itemmaster
                        WHERE
                            reseporderdetail.NoResep = '$NoResep' AND
                            reseporderdetail.KodeItem = itemmaster.KodeItem");

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
        <h2 class="text-center text-primary">Resep Detail</h2>
        <h4 class="text-center"><?php echo "No.Nota = $NoResep"; ?></h4>
        <table class="table table-striped table-bordered mt-4">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Kode</th>
                    <th>Nama Item</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                <?php
                while ($reseporderdetail = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $reseporderdetail['KodeItem'] . "</td>";
                    echo "<td>" . $reseporderdetail['NamaItem'] . "</td>";
                    echo "<td>" . $reseporderdetail['Jumlah'] . "</td>";
                    echo "<td>" . $reseporderdetail['Harga'] . "</td>";
                    echo "<td>" . $reseporderdetail['SubTotal'] . "</td>";
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
 










