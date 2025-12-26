<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Portal Berita</title><link rel="stylesheet" href="assets/css/style.css"></head>
<body>
<?php include 'partials/navbar.php'; ?>
<div class="container">
<div class="hero"><h1>Berita Terkini</h1><p>Tekno & Travel</p></div>
<div class="grid">
<?php $q=mysqli_query($conn,"SELECT * FROM berita ORDER BY id DESC"); while($b=mysqli_fetch_assoc($q)): ?>
<div class="card">
<img src="uploads/<?= $b['gambar'] ?>">
<h3><a href="detail.php?id=<?= $b['id'] ?>"><?= $b['judul'] ?></a></h3>
<small><?= $b['kategori'] ?> | <?= $b['tanggal'] ?></small>
</div>
<?php endwhile; ?>
</div>
</div>
<script src="assets/js/script.js"></script>
</body>
</html>