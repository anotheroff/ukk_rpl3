<?php
include 'koneksi.php';

$id = $_GET["id_pembayaran"];

try {
    $query = mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran='$id'");
    if ($query) {
        echo '<script>alert("Berhasil hapus"); window.location.href = "pembayaran.php";</script>';
    } else {
        echo '<script>alert("Gagal hapus");</script>';
    }
} catch (mysqli_sql_exception $e) {
    echo '<script>alert("Gagal Menghapus Karena Ada Kesalahan Sistem"); window.location.href = "pembayaran.php";</script>';
}
?>
