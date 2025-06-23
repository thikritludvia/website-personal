<?php
include '../koneksi.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM person WHERE PersonKey = '$id'";
    $result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $place_of_birth = $_POST['place_of_birth'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $religion = $_POST['religion'];
    $gol_dar = $_POST['gol_dar'];

    $query_update = "UPDATE person SET Nama = '$nama', Gender = '$gender', DateOfBirth = '$dob', PlaceofBirth = '$place_of_birth', HomeAddress = '$address', HomePhone = '$phone', ReligionKey = '$religion', GolDar = '$gol_dar' WHERE PersonKey = '$id'";

    if (mysqli_query($mysqli, $query_update)) {
        header('Location: view_patient.php');
        exit;
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
    <title>Edit Patient</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Edit Pasien</h2>
    <form method="POST">
        <div class="form-group">
            <label for="nama">Nama Pasien</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['Nama']; ?>" required>
        </div>
        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="l" <?php if ($row['Gender'] == 'l') echo 'selected'; ?>>Laki-Laki</option>
                <option value="p" <?php if ($row['Gender'] == 'p') echo 'selected'; ?>>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="dob">Tanggal Lahir</label>
            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['DateOfBirth']; ?>" required>
        </div>
        <div class="form-group">
            <label for="place_of_birth">Tempat Lahir</label>
            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="<?php echo $row['PlaceofBirth']; ?>" required>
        </div>
        <div class="form-group">
            <label for="address">Alamat Rumah</label>
            <textarea class="form-control" id="address" name="address" rows="3" required><?php echo $row['HomeAddress']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="phone">Nomor Telepon</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['HomePhone']; ?>" required>
        </div>
        <div class="form-group">
            <label for="religion">Agama</label>
            <select class="form-control" id="religion" name="religion" required>
                <option value="Islam" <?php if ($row['ReligionKey'] == 'Islam') echo 'selected'; ?>>Islam</option>
                <option value="Kristen" <?php if ($row['ReligionKey'] == 'Kristen') echo 'selected'; ?>>Kristen</option>
                <option value="Katolik" <?php if ($row['ReligionKey'] == 'Katolik') echo 'selected'; ?>>Katolik</option>
                <option value="Hindu" <?php if ($row['ReligionKey'] == 'Hindu') echo 'selected'; ?>>Hindu</option>
                <option value="Budha" <?php if ($row['ReligionKey'] == 'Budha') echo 'selected'; ?>>Budha</option>
                <option value="Konghucu" <?php if ($row['ReligionKey'] == 'Konghucu') echo 'selected'; ?>>Konghucu</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gol_dar">Golongan Darah</label>
            <select class="form-control" id="gol_dar" name="gol_dar" required>
                <option value="A" <?php if ($row['GolDar'] == 'A') echo 'selected'; ?>>A</option>
                <option value="B" <?php if ($row['GolDar'] == 'B') echo 'selected'; ?>>B</option>
                <option value="AB" <?php if ($row['GolDar'] == 'AB') echo 'selected'; ?>>AB</option>
                <option value="O" <?php if ($row['GolDar'] == 'O') echo 'selected'; ?>>O</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='view_patient.php'">Cancel</button>
    </form>
</div>
<script src="../assets/bootstrap-4.6.2/js/bootstrap.min.js"></script>
</body>
</html>
