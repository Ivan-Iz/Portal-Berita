<?php include 'config/koneksi.php'; $id=$_GET['id']; $b=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM berita WHERE id='$id'")); ?>
<!DOCTYPE html><html><head><title><?= $b['judul'] ?></title><link rel="stylesheet" href="assets/css/style.css"></head>
<body><?php include 'partials/navbar.php'; ?>
<div class="container"><div class="card">
<img src="uploads/<?= $b['gambar'] ?>">
<h2><?= $b['judul'] ?></h2><small><?= $b['tanggal'] ?></small>
<p><?= nl2br($b['isi']) ?></p></div></div></body></html>