<?php
include_once 'koneksi.php';

// Pastikan id_barang telah diterima dari parameter GET
if (isset ($_GET['id'])) {
   $id = $_GET['id'];

   // Hindari SQL injection dengan menggunakan parameterized query
   $sql = "DELETE FROM data_barang WHERE id_barang = ?";

   // Persiapkan statement
   $stmt = mysqli_prepare($conn, $sql);

   // Bind parameter id ke statement
   mysqli_stmt_bind_param($stmt, "i", $id);

   // Eksekusi statement
   mysqli_stmt_execute($stmt);

   // Tutup statement
   mysqli_stmt_close($stmt);

   // Redirect kembali ke halaman index.php setelah penghapusan
   header('Location: index.php');
   exit(); // Penting untuk menghentikan eksekusi script setelah melakukan redirect
} else {
   // Jika tidak ada id_barang yang diberikan, redirect kembali ke halaman index.php
   header('Location: index.php');
   exit(); // Penting untuk menghentikan eksekusi script setelah melakukan redirect
}
?>