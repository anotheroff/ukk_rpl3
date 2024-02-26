<?php
include 'koneksi.php';

$id = $_GET["NIS"];

try {
    $query = mysqli_query($conn, "DELETE FROM siswa WHERE NIS='$id'");
    if ($query) {
        echo '<script>alert("Berhasil hapus"); window.location.href = "siswa.php";</script>';
    } else {
        echo '<script>alert("Gagal hapus");</script>';
    }
} catch (mysqli_sql_exception $e) {
    echo '<script>alert("Gagal Menghapus Siswa Karena Memiliki Data Pembayaran"); window.location.href = "siswa.php";</script>';
}
?>
