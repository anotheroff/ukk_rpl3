<?php

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include 'koneksi.php';
if (isset($_POST["submit"])) {
    $id_kelas = $_GET['id_kelas'];
    $nama_kelas = $_POST["nama_kelas"];
    $kompetensi_keahlian = $_POST["kompetensi_keahlian"];
    $insert = mysqli_query($conn, "UPDATE kelas SET nama_kelas= '$nama_kelas', kompetensi_keahlian= '$kompetensi_keahlian' WHERE id_kelas='$id_kelas'");

    if ($insert) {
        echo '<script>alert("Berhasil edit Kelas"); window.location.href = "kelas.php";</script>';
    } else {
        echo '<script>alert("Gagal edit Kelas");</script>';
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
    $id_kelas = $_GET['id_kelas'];
    $update = mysqli_query($conn, "SELECT * from kelas WHERE id_kelas='$id_kelas'");
    foreach ($update as $row) {
        ?>
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <form class="" action="" method="post">
                        <div class="form-group">
                            <label>ID Kelas</label>
                            <input type="text" class="form-control" name="id_kelas" value="<?php echo $row['id_kelas']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control"
                                value="<?php echo $row['nama_kelas']; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Keahlian</label>
                            <input type="text" name="kompetensi_keahlian" class="form-control"
                                value="<?php echo $row['kompetensi_keahlian']; ?>" />
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <a style="color:white" href="kelas.php" class="btn btn-secondary">Lihat Kelas Lainnya</a>
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