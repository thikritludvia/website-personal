<?php
include_once('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $KodeItem = $_POST['KodeItem'];
    $PatnerKey = $_POST['PatnerKey'];
    $NamaItem = $_POST['NamaItem'];
    $HargaHNA = $_POST['HargaHNA'];
    $SatuanStok = $_POST['SatuanStok'];
    $IsActive = $_POST['IsActive'];

    $query = "INSERT INTO itemmaster (KodeItem, PatnerKey, NamaItem, HargaHNA, SatuanStok, IsActive) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, 'ssssss', $KodeItem, $PatnerKey, $NamaItem, $HargaHNA, $SatuanStok, $IsActive);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($mysqli) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Item Master</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center text-primary">Tambah Item Master</h2>
        <form action="" method="POST" class="mt-4">
            <div class="form-group">
                <label for="KodeItem">Kode Item</label>
                <input type="text" class="form-control" id="KodeItem" name="KodeItem" required>
            </div>
            <div class="form-group">
                <label for="PatnerKey">Partner Key</label>
                <input type="text" class="form-control" id="PatnerKey" name="PatnerKey" required>
            </div>
            <div class="form-group">
                <label for="NamaItem">Nama Item</label>
                <input type="text" class="form-control" id="NamaItem" name="NamaItem" required>
            </div>
            <div class="form-group">
                <label for="HargaHNA">Harga HNA</label>
                <input type="number" class="form-control" id="HargaHNA" name="HargaHNA" required>
            </div>
            <div class="form-group">
                <label for="SatuanStok">Satuan Stok</label>
                <input type="text" class="form-control" id="SatuanStok" name="SatuanStok" required>
            </div>
            <div class="form-group">
                <label for="IsActive">Is Active</label>
                <select class="form-control" id="IsActive" name="IsActive" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
