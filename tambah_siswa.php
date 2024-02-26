<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include 'koneksi.php';

$query_kelas = mysqli_query($conn, "SELECT * FROM kelas");
$kelas_options = '';
while ($row = mysqli_fetch_assoc($query_kelas)) {
    $kelas_options .= '<option value="' . $row['id_kelas'] . '">' . $row['id_kelas'] . ' - ' . $row['nama_kelas'] . ' - ' . $row['kompetensi_keahlian'] . '</option>';
}

if (isset($_POST["submit"])) {
    $NIS = $_POST["NIS"];
    $Nama = $_POST["Nama"];
    $id_kelas = $_POST["id_kelas"];

    $check_siswa = mysqli_query($conn, "SELECT * FROM siswa WHERE NIS = '$NIS'");
    if (mysqli_num_rows($check_siswa) > 0) {
        echo '<script>alert("NIS Sudah Ada Di Database");</script>';
    } else {
        $siswa = mysqli_query($conn, "INSERT INTO siswa(NIS, Nama, id_kelas) values('$NIS','$Nama','$id_kelas')");

        if ($siswa) {
            echo '<script>alert("Berhasil Menambahkan"); window.location.href = "siswa.php";</script>';
        } else {
            echo '<script>alert("Gagal Menambahkan");</script>';
        }
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
                <h2 class="text-center">Tambah Siswa</h2>
                <form class="" action="" method="post">
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" name="NIS" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="Nama" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>ID Kelas</label>
                        <select class="form-select" name="id_kelas" aria-label="Default select example">
                            <option value="">Pilih Kelas</option>
                            <?php echo $kelas_options; ?>
                        </select>
                    </div>


                    <div class="mt-3">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <a style="color:white" href="siswa.php" class="btn btn-secondary">Lihat Siswa Lainnya</a>
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