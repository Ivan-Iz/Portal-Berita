<?php
include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Berita Travel</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include 'partials/navbar.php'; ?>

<div class="container">
    <h2>Berita Travel</h2>

    <?php
    $q = mysqli_query($conn, "SELECT * FROM berita WHERE kategori='travel' ORDER BY id DESC");
    while ($b = mysqli_fetch_assoc($q)):
    ?>
        <div class="card">
        <img src="uploads/<?= $b['gambar'] ?>">
        <h3>
            <a href="detail.php?id=<?= $b['id'] ?>">
            <?= htmlspecialchars($b['judul']) ?>
            </a>
        </h3>
        <p><?= substr($b['isi'], 0, 120) ?>...</p>
        </div>
    <?php endwhile; ?>
</div>

<script src="assets/js/script.js"></script>
</body>
</html>
