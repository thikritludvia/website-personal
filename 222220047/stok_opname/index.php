<?php
    include_once("../koneksi.php");

    $result = mysqli_query($mysqli,
    "SELECT
     NoTransaksi, Tanggal, Keterangan, EnteredBy
     FROM
     stockopname
    ");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Opname</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center text-primary">Daftar Stok Opname</h2>
        <table class="table table-striped table-bordered mt-4">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No. Transaksi</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>EnteredBy</th>
                </tr>
            </thead>

            <tbody class="bg-light">
                <?php
                while ($stokopname = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>
                        <a href ='stokopnamedetail.php?NoTransaksi=".$stokopname['NoTransaksi']."'>".$stokopname['NoTransaksi']."</a>
                        </td>";
                    echo "<td>".$stokopname['Tanggal']."</td>";
                    echo "<td>".$stokopname['Keterangan']."</td>";
                    echo "<td>".$stokopname['EnteredBy']."</td>";  
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
        