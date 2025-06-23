<?php
include '../koneksi.php';

// Cek apakah ada data nomor rekam medis yang dikirimkan dari form
if (isset($_POST['no_rekam_medik'])) {
    $no_rekam_medik = $_POST['no_rekam_medik'];

    // Query untuk memeriksa apakah rekam medis sudah ada di tabel personsinpartners
    $query_check = "SELECT p.PersonKey, p.NoRekamMedis
                    FROM person p
                    INNER JOIN personsinpartners pp ON p.PersonKey = pp.PersonKey
                    WHERE pp.MedicalRecordNumber = '$no_rekam_medik'";
    $result_check = mysqli_query($mysqli, $query_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Jika rekam medis sudah ada, redirect ke halaman daftar pasien
        header("Location: view_patient.php");
        exit;
    } else {
        // Jika belum ada, tampilkan form pendaftaran pasien baru
        $form_visible = true;
    }
} else {
    //  tampilkan form untuk cek rekam medis
    $form_visible = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pasien Baru</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
    <link href="../assets/style.css" rel="stylesheet"/>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Cek Rekam Medis Pasien</h2>

    <?php if (!$form_visible): ?>
    <form action="index.php" method="POST">
        <div class="note-tag">
            <p><strong>Catatan:</strong> Nomor Rekam Medis harus menggunakan format <strong>RM-000</strong>, seperti RM-0001, RM-0002, dan seterusnya. Yang sudah saya daftarkan RM-0001 Sampai dengan RM-0005</p>
        </div>
        <div class="form-group">
            <label for="no_rekam_medik">Nomor Rekam Medis</label>
            <input type="text" class="form-control" id="no_rekam_medik" name="no_rekam_medik" placeholder="Masukkan Nomor Rekam Medis" required>
        </div>
        <button type="submit" class="btn btn-primary">Cek Rekam Medis</button>
        <a href="http://localhost/222220047/" class="btn btn-secondary">Kembali ke Home</a>
        <a href="view_patient.php" class="btn btn-secondary">Master Pasien</a>
    </form>
    <?php else: ?>
    <h2 class="text-center mt-4">Formulir Pasien Baru</h2>
    <form action="input.php" method="POST">
        <div class="form-group">
            <label for="nama">Nama Pasien</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Pasien" required>
        </div>
        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="l">Laki-Laki</option>
                <option value="p">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="dob">Tanggal Lahir</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
        </div>
        <div class="form-group">
            <label for="place_of_birth">Tempat Lahir</label>
            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" placeholder="Masukkan Tempat Lahir" required>
        </div>
        <div class="form-group">
            <label for="address">Alamat Rumah</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="phone">Nomor Telepon</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukkan Nomor Telepon" required>
        </div>
        <div class="form-group">
            <label for="religion">Agama</label>
            <select class="form-control" id="religion" name="religion" required>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gol_dar">Golongan Darah</label>
            <select class="form-control" id="gol_dar" name="gol_dar" required>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="O">O</option>
            </select>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary mr-2">Tambah Pasien</button>
            <button type="button" class="btn btn-secondary mr-2" onclick="window.location.href='index.php'">Batal</button>
            <button type="button" class="btn btn-info mr-2" onclick="window.location.href='view_patient.php'">Lihat Pasien</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='../'">Kembali ke Home</button>
        </div>
    </form>
    <?php endif; ?>
</div>

<script src="../assets/bootstrap-4.6.2/js/bootstrap.min.js"></script>
</body>
</html>
