<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="kelas.php" class="navbar-brand">Kelas</a>
            <a href="siswa.php" class="navbar-brand">Siswa</a>
            <a href="payment.php" class="navbar-brand">Pembayaran</a>

            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <a href="logout.php" class="btn btn-outline-danger" type="submit">Logout</a>
            </form>
        </div>
    </nav>

    <div class="container table-responsive mt-3">
        <div>
            <div class="d-flex justify-content-start">
                <h2>Pembayaran</h2>
            </div>
            <div class="d-flex justify-content-end">
                <a href="add_payment.php" class="btn btn-success">Tambah Pembayaran</a>
            </div>
        </div>
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Id Pembayaran</th>
                    <th>Id Petugas</th>
                    <th>NIS</th>
                    <th>Tanggal Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $mahasiswa = mysqli_query($conn, "SELECT * from pembayaran");
                $no = 1;
                foreach ($mahasiswa as $row) {
                    echo "<tr>
                        <td>$no</td>
                        <td>" . $row['id_pembayaran'] . "</td>
                        <td>" . $row['NIS'] . "</td>
                        <td>" . $row['tgl_bayar'] . "</td>
                        <td>" . $row['jumlah_bayar'] . "</td>
                        <td>" . $row['jumlah_bayar'] . "</td>
                        <td></td>
                        </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>

</html>