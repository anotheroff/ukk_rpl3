<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include 'koneksi.php';

$id_petugas = $_SESSION['id_petugas'];

$query_pembayaran = mysqli_query($conn, "SELECT * FROM siswa");
$NIS_options = '';
while ($row = mysqli_fetch_assoc($query_pembayaran)) {
    $NIS_options .= '<option value="' . $row['NIS'] . '">' . $row['NIS'] . ' - ' . $row['Nama'] . '</option>';
}

if (isset($_POST["submit"])) {
    $NIS = $_POST["NIS"];
    $tgl_bayar = $_POST["tgl_bayar"];
    $jumlah_bayar = $_POST["jumlah_bayar"];

    // Tambahkan id_petugas ke dalam query insert
    $siswa = mysqli_query($conn, "INSERT INTO pembayaran(id_petugas, NIS, tgl_bayar, jumlah_bayar) values('$id_petugas','$NIS','$tgl_bayar','$jumlah_bayar')");

    if ($siswa) {
        echo '<script>alert("Berhasil Menambahkan"); window.location.href = "pembayaran.php";</script>';
    } else {
        echo '<script>alert("Gagal Menambahkan");</script>';
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    <title>Pembayaran SPP</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Tambah pembayaran</h2>
                <form class="" action="" method="post">
                    <div class="form-group">
                        <label>NIS</label>
                        <select class="form-select" name="NIS" aria-label="Default select example">
                            <option value="">Pilih NIS</option>
                            <?php echo $NIS_options; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Bayar</label>
                        <input type="date" name="tgl_bayar" value="<?php echo date("Y-m-d"); ?>" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Jumlah Bayar</label>
                        <input type="number" name="jumlah_bayar" class="form-control" />
                    </div>


                    <div class="mt-3">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <a style="color:white" href="pembayaran.php" class="btn btn-secondary">Lihat Pembayaran
                            Lainnya</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous"></script>

</body>

</html>