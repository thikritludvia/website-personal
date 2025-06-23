<?php
include_once('../koneksi.php');

$query = "SELECT KodeItem, PatnerKey, NamaItem, HargaHNA, SatuanStok, IsActive FROM itemmaster";
$result = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Master</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center text-primary">Daftar Item Master</h2>
        <div class="text-right mb-3">
            <a href="tambah.php" class="btn btn-success">Tambah Item</a>
        </div>
        <table class="table table-striped table-bordered mt-4">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Kode Item</th>
                    <th>Nama Item</th>
                    <th>Harga HNA</th>
                    <th>Satuan Stok</th>
                    <th>Is Active</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['KodeItem']}</td>
                            <td>{$row['NamaItem']}</td>
                            <td>{$row['HargaHNA']}</td>
                            <td>{$row['SatuanStok']}</td>
                            <td>{$row['IsActive']}</td>
                          </tr>";
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
