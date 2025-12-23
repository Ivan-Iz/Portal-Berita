<?php
session_start();
include '../config/koneksi.php';
if (!isset($_SESSION['admin'])) header('Location: login.php');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
<style>
body{
    background:#f2f4f7;
    font-family:Arial;
    margin:0;
}
.header{
    background:#0a2647;
    color:white;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}
.container{
    padding:30px;
}
a.btn{
    background:#0a2647;
    color:white;
    padding:8px 12px;
    border-radius:5px;
    text-decoration:none;
    font-size:14px;
}
a.logout{
    background:#c0392b;
}
table{
    width:100%;
    border-collapse:collapse;
    background:white;
    margin-top:20px;
    border-radius:8px;
    overflow:hidden;
}
th,td{
    border-bottom:1px solid #eee;
    padding:12px;
}
th{
    text-align:left;
    background:#f9fafb;
}
.action a{
    text-decoration:none;
    margin-right:8px;
    font-weight:bold;
}
.edit{color:#2980b9}
.hapus{color:#c0392b}
</style>
</head>
<body>

<div class="header">
    <a href="logout.php" class="btn logout">Logout</a>
    <h3>Dashboard Admin</h3>
</div>

<div class="container">
    <a href="tambah_berita.php" class="btn">+ Tambah Berita</a>

    <table>
        <tr>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>

        <?php
        $q = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC");
        while ($b = mysqli_fetch_assoc($q)):
        ?>
        <tr>
            <td><?= htmlspecialchars($b['judul']) ?></td>
            <td><?= $b['kategori'] ?></td>
            <td><?= $b['tanggal'] ?></td>
            <td class="action">
                <a href="edit_berita.php?id=<?= $b['id'] ?>" class="edit">Edit</a>
                <a href="hapus.php?id=<?= $b['id'] ?>" class="hapus" onclick="return confirm('Hapus berita ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
