<?php

include '../koneksi.php'; 



if (isset($_GET['PersonKey'])) {
    $personKey = $_GET['PersonKey'];

    $sql = "SELECT * FROM person WHERE PersonKey = ?";
    $stmt = $mysqli->prepare($sql); 
    $stmt->bind_param("i", $personKey);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "PersonKey tidak ditemukan.";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $nama = $_POST['Nama'];
    $gender = $_POST['Gender'];
    $dateOfBirth = $_POST['DateOfBirth'];
    $placeOfBirth = $_POST['PlaceofBirth'];
    $homeAddress = $_POST['HomeAddress'];
    $homePhone = $_POST['HomePhone'];
    $workAddress = $_POST['WorkAddress'];
    $workPhone = $_POST['WorkPhone'];
    $emailAddress = $_POST['EmailAddress'];
    $mobilePhone = $_POST['MobilePhone'];
    $noBPJS = $_POST['NoBPJS'];

    $updateSql = "UPDATE person SET Nama=?, Gender=?, DateOfBirth=?, PlaceofBirth=?, HomeAddress=?, HomePhone=?, WorkAddress=?, WorkPhone=?, EmailAddress=?, MobilePhone=?, NoBPJS=? WHERE PersonKey=?";
    $updateStmt = $mysqli->prepare($updateSql); 
    $updateStmt->bind_param("sssssssssssi", $nama, $gender, $dateOfBirth, $placeOfBirth, $homeAddress, $homePhone, $workAddress, $workPhone, $emailAddress, $mobilePhone, $noBPJS, $personKey);
    
    if ($updateStmt->execute()) {
        
        header("Location: view_patient.php"); 
        exit;
    } else {
        echo "Gagal memperbarui data.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pasien</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detail Pasien</h1>
        
        <form action="detail.php?PersonKey=<?php echo $personKey; ?>" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Nama">Nama Pasien</label>
                    <input type="text" class="form-control" name="Nama" value="<?php echo htmlspecialchars($row['Nama']); ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="Gender">Jenis Kelamin</label>
                    <select class="form-control" name="Gender" required>
                        <option value="l" <?php echo ($row['Gender'] == 'l') ? 'selected' : ''; ?>>Laki-Laki</option>
                        <option value="p" <?php echo ($row['Gender'] == 'p') ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="DateOfBirth">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="DateOfBirth" value="<?php echo htmlspecialchars($row['DateOfBirth']); ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="PlaceofBirth">Tempat Lahir</label>
                    <input type="text" class="form-control" name="PlaceofBirth" value="<?php echo htmlspecialchars($row['PlaceofBirth']); ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="HomeAddress">Alamat Rumah</label>
                <input type="text" class="form-control" name="HomeAddress" value="<?php echo htmlspecialchars($row['HomeAddress']); ?>" required>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="HomePhone">No Telepon Rumah</label>
                    <input type="text" class="form-control" name="HomePhone" value="<?php echo htmlspecialchars($row['HomePhone']); ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="WorkAddress">Alamat Kerja</label>
                    <input type="text" class="form-control" name="WorkAddress" value="<?php echo htmlspecialchars($row['WorkAddress']); ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="WorkPhone">No Telepon Kerja</label>
                    <input type="text" class="form-control" name="WorkPhone" value="<?php echo htmlspecialchars($row['WorkPhone']); ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="EmailAddress">Email</label>
                    <input type="email" class="form-control" name="EmailAddress" value="<?php echo htmlspecialchars($row['EmailAddress']); ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="MobilePhone">No HP</label>
                    <input type="text" class="form-control" name="MobilePhone" value="<?php echo htmlspecialchars($row['MobilePhone']); ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="NoBPJS">Nomor BPJS</label>
                    <input type="text" class="form-control" name="NoBPJS" value="<?php echo htmlspecialchars($row['NoBPJS']); ?>" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui Data</button>
        </form>

        <a href="view_patient.php" class="btn btn-secondary mt-3">Kembali ke Daftar Pasien</a>
    </div>

    <script src="../assets/bootstrap-4.6.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
