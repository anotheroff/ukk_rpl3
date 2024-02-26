<?php
include 'koneksi.php';

$id = $_GET["id_kelas"];

try {
    $query = mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas='$id'");
    if ($query) {
        echo '<script>alert("Berhasil hapus"); window.location.href = "kelas.php";</script>';
    } else {
        echo '<script>alert("Gagal hapus");</script>';
    }
} catch (mysqli_sql_exception $e) {
    echo '<script>alert("Gagal Menghapus Kelas Karena Masih Ada Data Siswa"); window.location.href = "kelas.php";</script>';
}
?>
