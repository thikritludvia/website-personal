<?php
// Menghubungkan ke database
include('../koneksi.php');

// Ambil data pasien untuk No Rekam Medis
$queryPasien = "SELECT PersonKey, Nama FROM person";
$resultPasien = mysqli_query($mysqli, $queryPasien);

// Ambil data item dari tabel itemmaster untuk Detail Biaya
$queryItem = "SELECT KodeItem, NamaItem, HargaHNA FROM itemmaster";
$resultItem = mysqli_query($mysqli, $queryItem);


$queryLastNoBilling = "SELECT NoBilling FROM billingpenjaminheader WHERE NoBilling LIKE '20240605%' ORDER BY NoBilling DESC LIMIT 1";
$resultLastNoBilling = mysqli_query($mysqli, $queryLastNoBilling);
$lastNoBilling = mysqli_fetch_assoc($resultLastNoBilling);

// Menentukan nomor urut yang baru berdasarkan NoBilling sebelumnya
if ($lastNoBilling) {
    // Mengambil angka terakhir dari NoBilling
    $lastNumber = substr($lastNoBilling['NoBilling'], -3); 
    $nextNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT); 
} else {
    $nextNumber = '0005'; 
}


$noBilling = '20240605' . $nextNumber; 
 
// Ambil NoReferensi terakhir
$queryLastNoReferensi = "SELECT NoReferensi FROM billingpenjaminsubheader ORDER BY NoReferensi DESC LIMIT 1";
$resultLastNoReferensi = mysqli_query($mysqli, $queryLastNoReferensi);
$lastNoReferensi = mysqli_fetch_assoc($resultLastNoReferensi);
$nextNoReferensi = $lastNoReferensi ? 'AK' . substr($lastNoReferensi['NoReferensi'], 2, 6) . str_pad(substr($lastNoReferensi['NoReferensi'], -4) + 1, 4, '0', STR_PAD_LEFT) : 'AK2024060006';

// Proses jika form disubmit (POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $noRekamMedis = $_POST['noRekamMedis'];
    $NoReferensi = $_POST['NoReferensi'];
    $TanggalMasuk = $_POST['TanggalMasuk'];
    $TanggalKeluar = $_POST['TanggalKeluar'];
    $CanceledReason = $_POST['CanceledReason'];
    $kelasHarga = $_POST['kelasHarga'];
    $detailBiaya = $_POST['detailBiaya']; 
    $totalTagihan = 0;
    $dokterKey = $_POST['dokterKey'];
    $namadokter = $_POST['namadokter'];
    $closedDate = $_POST['closedDate'];
    $closedBy = $_POST['closedBy'];
    $ExecutedDate =$_POST['ExecutedDate'];
    $TglProses=$_POST['TglProses'];
    

    
           

   
     $isValidDate = (strtotime($Tanggal) <= strtotime($TglProses)) && (strtotime($TglProses) <= strtotime($closedDate));

     if (!$isValidDate) {
         echo "<script>alert('Tanggal Proses tidak valid. Pastikan Tanggal Proses antara Executed Date dan Closed Date.');</script>";
         exit();
     }

    // Menghitung total tagihan berdasarkan detail biaya
    foreach ($detailBiaya as $kodeItem => $jumlah) {
        $itemQuery = "SELECT HargaHNA FROM itemmaster WHERE KodeItem = '$kodeItem'";
        $itemResult = mysqli_query($mysqli, $itemQuery);
        $itemData = mysqli_fetch_assoc($itemResult);
        $harga = $itemData['HargaHNA'];
        $totalTagihan += $jumlah * $harga;
    }

    
    $insertQuery = "INSERT INTO billingpenjaminheader (NoBilling, PersonKeyPatient, TanggalMasuk, TanggalKeluar, TotalTagihan, CanceledReason, KelasHarga, DokterKey, namadokter, ClosedDate, ClosedBy)
                    VALUES ('$noBilling', '$noRekamMedis', '$TanggalMasuk','$TanggalKeluar', '$totalTagihan', '$CanceledReason', '$kelasHarga', '$dokterKey', '$namadokter', '$closedDate', '$closedBy')";
    mysqli_query($mysqli, $insertQuery);

    $insertNoReferensiQuery = "INSERT INTO billingpenjaminsubheader (NoReferensi, NoBilling,Tanggal,ExecutedDate,TglProses) 
                               VALUES ('$NoReferensi', '$noBilling','$TanggalMasuk','$ExecutedDate','$TglProses')";
    mysqli_query($mysqli, $insertNoReferensiQuery);

    // Menambahkan detail biaya ke billingpenjamindetail
    foreach ($detailBiaya as $kodeItem => $jumlah) {
        $itemQuery = "SELECT HargaHNA FROM itemmaster WHERE KodeItem = '$kodeItem'";
        $itemResult = mysqli_query($mysqli, $itemQuery);
        $itemData = mysqli_fetch_assoc($itemResult);
        $harga = $itemData['HargaHNA'];
        $total = $jumlah * $harga;

        // Menyimpan detail biaya ke billingpenjamin detail
        $insertDetailQuery = "INSERT INTO billingpenjamindetail (NoReferensi, KodeItem, NoBilling, Harga, Jumlah, TotalHarga)
                              VALUES ('$NoReferensi', '$kodeItem', '$noBilling', '$harga', '$jumlah', '$total')";
        mysqli_query($mysqli, $insertDetailQuery);
    }

    
    header("Location: ../billing/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Admisi</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Form Admisi</h2>
        <form action="index.php" method="POST">
            
            <div class="form-group">
                <label for="noRekamMedis">No Rekam Medis:</label>
                <select name="noRekamMedis" id="noRekamMedis" class="form-control" required>
                    <option value="">Pilih Pasien</option>
                    <?php 
                    while ($row = mysqli_fetch_assoc($resultPasien)) {
                        $noRekamMedisFormatted = 'RM-' . str_pad($row['PersonKey'], 4, '0', STR_PAD_LEFT);
                        echo "<option value='{$row['PersonKey']}'>No Rekam Medis: $noRekamMedisFormatted - {$row['Nama']}</option>"; 
                    }
                    ?>
                </select>
            </div>

            
            <div class="form-group">
                <label for="NoReferensi">No Referensi:</label>
                <input type="text" name="NoReferensi" id="NoReferensi" class="form-control" value="<?php echo $nextNoReferensi; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="noBilling">No Billing:</label>
                <input type="text" name="noBilling" id="noBilling" class="form-control" value="<?php echo $noBilling; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="TanggalMasuk">Tanggal Masuk:</label>
                <input type="datetime-local" name="TanggalMasuk" id="TanggalMasuk" class="form-control" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
            </div>
            <div class="form-group">
                <label for="TanggalKeluar">Tanggal Keluar:</label>
                <input type="datetime-local" name="TanggalKeluar" id="TanggalKeluar" class="form-control" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
            </div>

            <div class="form-group">
                <label for="namaPasien">Nama Pasien:</label>
                <input type="text" name="namaPasien" id="namaPasien" class="form-control" readonly>
            </div>

            
            <div class="form-group" id="detailBiayaSection">
                <label for="detailBiaya">Detail Biaya:</label>
                <div id="detailBiaya">
                    <?php 
                    while ($item = mysqli_fetch_assoc($resultItem)) {
                    ?>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="checkbox" name="detailBiaya[<?php echo $item['KodeItem']; ?>]" value="1" class="item-checkbox" id="kodeItem<?php echo $item['KodeItem']; ?>" data-kodeitem="<?php echo $item['KodeItem']; ?>" data-namaitem="<?php echo $item['NamaItem']; ?>" data-hargahna="<?php echo $item['HargaHNA']; ?>">
                                <label for="kodeItem<?php echo $item['KodeItem']; ?>"><?php echo $item['NamaItem']; ?> - Rp <?php echo number_format($item['HargaHNA'], 0, ',', '.'); ?></label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="jumlah[<?php echo $item['KodeItem']; ?>]" class="form-control" placeholder="Jumlah">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="form-group">
                <label for="kelasHarga">Kelas Harga:</label>
                <select name="kelasHarga" id="kelasHarga" class="form-control" required>
                    <option value="VVIP">VVIP</option>
                    <option value="VIP">VIP</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>

            
            <div class="form-group">
                <label for="dokterKey">Dokter:</label>
                <select name="dokterKey" id="dokterKey" class="form-control">
                    <option value="D0001">D0001</option>
                    <option value="D0002">D0002</option>
                    <option value="D0003">D0003</option>
                    <option value="D0004">D0004</option>
                </select>
            </div>

            <div class="form-group">
                <label for="namadokter">Nama Dokter:</label>
                <input type="text" name="namadokter" id="namadokter" class="form-control" value="" required>
            </div>
            <div class="form-group">
                <label for="CanceledReason">Canceled Reason :</label>
                <input type="text" name="CanceledReason" id="CanceledReason" class="form-control" value="" required>
            </div>
            <div class="form-group">
                <label for="closedDate">Tanggal Closed:</label>
                <input type="datetime-local" name="closedDate" id="closedDate" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($currentDateTime)); ?>" required>
            </div>

            <div class="form-group">
                <label for="closedBy">Closed By:</label>
                <input type="text" name="closedBy" id="closedBy" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ExecutedDate">ExecutedDate :</label>
                <input type="datetime-local" name="ExecutedDate" id="ExecutedDate" class="form-control" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
            </div>

            <div class="form-group">
                <label for="TglProses">Tanggal Proses:</label>
                <input type="datetime-local" name="TglProses" id="TglProses" class="form-control" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
            </div>


            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="http://localhost/222220047/" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <script src="../assets/bootstrap-4.6.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
