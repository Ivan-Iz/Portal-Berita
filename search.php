<?php
include 'config/koneksi.php';

$q = $_GET['q'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pencarian</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include 'partials/navbar.php'; ?>

<div class="container">
    <h2>Hasil pencarian: "<b><?= htmlspecialchars($q) ?></b>"</h2>

    <?php
    if ($q != '') {
        $sql = mysqli_query(
        $conn,
        "SELECT * FROM berita 
        WHERE judul LIKE '%$q%' 
            OR isi LIKE '%$q%' 
        ORDER BY id DESC"
        );

        if (mysqli_num_rows($sql) > 0) {
        while ($b = mysqli_fetch_assoc($sql)) {
    ?>
            <div class="card">
            <img src="uploads/<?= $b['gambar'] ?>">
            <h3>
                <a href="detail.php?id=<?= $b['id'] ?>">
                <?= htmlspecialchars($b['judul']) ?>
                </a>
            </h3>
            <small><?= $b['kategori'] ?> | <?= $b['tanggal'] ?></small>
            <p><?= substr($b['isi'], 0, 120) ?>...</p>
            </div>
    <?php
        }
        } else {
        echo "<p><b>Tidak ada berita ditemukan.</b></p>";
        }
    } else {
        echo "<p>Kata kunci pencarian kosong.</p>";
    }
    ?>
</div>

<script src="assets/js/script.js"></script>
</body>
</html>
