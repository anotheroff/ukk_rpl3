<?php
include 'koneksi.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['tcari'])) {
    $search_query = $_POST['cari'];
    $sql = "SELECT * FROM kelas  WHERE 
            id_kelas LIKE '%$search_query%' OR
            nama_kelas LIKE '%$search_query%' OR
            kompetensi_keahlian LIKE '%$search_query%'
            ORDER BY id_kelas DESC";
} else {
    // Default query without search
    $sql = "SELECT * FROM kelas ORDER BY id_kelas DESC";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran SPP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
        }
        
        .navbar-nav {
            font-weight: bold;
            padding-left: 8%;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="kelas.php">Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="siswa.php">Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pembayaran.php">Pembayaran</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-3">
        <div class="d-flex mb-3">
            <form method="POST" class="d-flex mx-auto ">
                <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary me-2" type="submit" name="tcari">Search</button>
                <button href="kelas.php" class="btn btn-secondary me-2" type="submit"
                    name="refresh">Refresh</button>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </form>
        </div>
        <table class="table table-striped table-hover table-bordered">
            <a href="tambah_kelas.php" class="btn btn-success mb-3">Tambah Kelas</a>
            <thead class="table-light">
                <th>ID Kelas</th>
                <th>Nama Kelas</th>
                <th>Kompetensi Keahlian</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id_kelas']}</td>";
                    echo "<td>{$row['nama_kelas']}</td>";
                    echo "<td>{$row['kompetensi_keahlian']}</td>";
                    echo "<td>
                            <a href='edit_kelas.php?id_kelas={$row['id_kelas']}' style='color:white;'class='btn btn-warning'>Edit</a>
                            <a href='hapus_kelas.php?id_kelas={$row['id_kelas']}' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'>Hapus</a>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455r+AoJl+0I4" crossorigin="anonymous">
    </script>

</html>