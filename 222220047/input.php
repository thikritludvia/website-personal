 <?php
include_once("koneksi.php"); 

// Cek apakah tombol submit ditekan
if (isset($_POST['submit'])) {
    // Ambil data dari form input
    $noBilling = $_POST['noBilling'];
    $personKeyPatient = $_POST['personKeyPatient'];
    $tanggalMasuk = $_POST['tanggalMasuk'];
    $tanggalKeluar = $_POST['tanggalKeluar'];
    $totalTagihan = $_POST['totalTagihan'];
    $canceledReason = $_POST['canceledReason'];
    $kelasHarga = $_POST['kelasHarga'];
    $dokterKey = $_POST['dokterKey'];
    $closedDate = $_POST['closedDate'];
    $closedBy = $_POST['closedBy'];

    // Query untuk menambahkan data ke database
    $query = "INSERT INTO billingpenjaminheader 
              (NoBilling, PersonKeyPatient, TanggalMasuk, TanggalKeluar, TotalTagihan, CanceledReason, KelasHarga, DokterKey, ClosedDate, ClosedBy) 
              VALUES 
              ('$noBilling', '$personKeyPatient', '$tanggalMasuk', '$tanggalKeluar', '$totalTagihan', '$canceledReason', '$kelasHarga', '$dokterKey', '$closedDate', '$closedBy')";


    if (mysqli_query($mysqli, $query)) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location.href = 'index.php'; // Redirect ke halaman utama
              </script>";
    } else {
        echo "Error: " . mysqli_error($mysqli); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Tagihan Pasien</title>
    <link rel="stylesheet" href="assets/bootstrap-4.6.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow rounded">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Input Tagihan Pasien</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label>No Billing</label>
                        <input type="text" name="noBilling" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Person Key Patient</label>
                        <input type="text" name="personKeyPatient" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="datetime-local" name="tanggalMasuk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Keluar</label>
                        <input type="datetime-local" name="tanggalKeluar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Total Tagihan</label>
                        <input type="number" name="totalTagihan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alasan Pembatalan</label>
                        <input type="text" name="canceledReason" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kelas Harga</label>
                        <input type="text" name="kelasHarga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Dokter Key</label>
                        <input type="text" name="dokterKey" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Closed Date</label>
                        <input type="datetime-local" name="closedDate" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Closed By</label>
                        <input type="text" name="closedBy" class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php" class="btn btn-secondary ml-2">Kembali ke Halaman Utama</a>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/bootstrap-4.6.2/js/bootstrap.min.js"></script>
</body>
</html>
