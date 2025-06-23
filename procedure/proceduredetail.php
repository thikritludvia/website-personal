<?php
    include_once("../koneksi.php");

  
    $NoProcedure = $_GET['NoProcedure'];

    
    $result = mysqli_query($mysqli, 
    "SELECT procedureorderdetail.NoProcedure, procedureorderdetail.KodeItem, 
    procedureorderdetail.KodeBaris, procedureorderdetail.Jumlah, procedureorderdetail.Harga, 
    procedureorderdetail.EnteredDate, procedureorderdetail.SubTotal, itemmaster.NamaItem 
    FROM procedureorderdetail, itemmaster
    WHERE procedureorderdetail.NoProcedure = '$NoProcedure' AND
    procedureorderdetail.KodeItem = itemmaster.KodeItem"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prosedur Detail</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center text-primary">Prosedur Detail</h2>
        <h4 class="text-center"><?php echo "No.Nota = $NoProcedure"; ?></h4>
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
                    while ($procedureorderdetail = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $procedureorderdetail['KodeItem'] . "</td>";
                        echo "<td>" . $procedureorderdetail['NamaItem'] . "</td>";
                        echo "<td>" . $procedureorderdetail['Jumlah'] . "</td>";
                        echo "<td>" . $procedureorderdetail['Harga'] . "</td>";
                        echo "<td>" . $procedureorderdetail['SubTotal'] . "</td>";
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
