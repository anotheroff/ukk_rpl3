<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include 'koneksi.php';
if (isset($_POST["submit"])) {
    $id_pembayaran = $_GET['id_pembayaran'];
    $NIS = $_POST['NIS'];
    $tgl_bayar = $_POST["tgl_bayar"];
    $jumlah_bayar = $_POST["jumlah_bayar"];
    $insert = mysqli_query($conn, "UPDATE pembayaran SET tgl_bayar= '$tgl_bayar', jumlah_bayar= '$jumlah_bayar', NIS = '$NIS' WHERE id_pembayaran='$id_pembayaran'");

    if ($insert) {
        echo '<script>alert("Berhasil Edit"); window.location.href = "pembayaran.php";</script>';
    } else {
        echo '<script>alert("Gagal Edit");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    <title>Pengaduan</title>
</head>

<body>
    <?php
    include 'koneksi.php';
    $id_pembayaran = $_GET['id_pembayaran'];
    $update = mysqli_query($conn, "SELECT * from pembayaran WHERE id_pembayaran='$id_pembayaran'");
    foreach ($update as $row) {
        ?>
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <form class="" action="" method="post">
                        <div class="form-group">
                            <input type="hidden" name="NIS" class="form-control"
                                value="<?php echo $row['id_pembayaran']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" name="NIS" class="form-control" value="<?php echo $row['NIS']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Bayar</label>
                            <input type="date" name="tgl_bayar" class="form-control" readonly
                                value="<?php echo $row['tgl_bayar']; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Jumlah Bayar</label>
                            <input type="text" name="jumlah_bayar" class="form-control"
                                value="<?php echo $row['jumlah_bayar']; ?>" />
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <a style="color:white" href="pembayaran.php" class="btn btn-secondary">Lihat Pembayaran Lainnya</a>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <!-- Hapus pengaturan Bootstrap yang duplikat -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous"></script>

</body>

</html>