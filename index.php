<?php
include ("./koneksi.php");
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <link href="style.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <title>Data Barang</title>
</head>

<body>
   <div class="container ">
      <h1>Data Barang</h1>
      <a href="tambah.php" class="w3-button w3-teal">Tambah</a>
      <div class="main ">
         <table class="w3-table w3-striped w3-bordered">
            <tr class="w3-green">
               <th>Gambar</th>
               <th>Nama Barang</th>
               <th>Kategori</th>
               <th>Harga Jual</th>
               <th>Harga Beli</th>
               <th>Stok</th>
               <th>Aksi</th>
            </tr>
            <?php if ($result): ?>
               <?php while ($row = mysqli_fetch_array($result)): ?>
                  <tr>
                     <td><img src="gambar/<?= $row['gambar']; ?>" alt="<?=
                          $row['nama']; ?>"></td>
                     <td>
                        <?= $row['nama']; ?>
                     </td>
                     <td>
                        <?= $row['kategori']; ?>
                     </td>
                     <td>
                        <?= $row['harga_beli']; ?>
                     </td>
                     <td>
                        <?= $row['harga_jual']; ?>
                     </td>
                     <td>
                        <?= $row['stok']; ?>
                     </td>
                     <td>
                        <a href="ubah.php?id=<?= $row['id_barang']; ?>">Ubah</a>
                        <a href="hapus.php?id=<?= $row['id_barang']; ?>">Hapus</a>
                     </td>
                  </tr>
               <?php endwhile; ?>
            <?php else: ?>
               <tr>
                  <td colspan="7">Belum ada data</td>
               </tr>
            <?php endif; ?>
         </table>
      </div>
   </div>
</body>

</html>