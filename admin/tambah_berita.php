<?php
session_start();
include '../config/koneksi.php';
if (!isset($_SESSION['admin'])) header('Location: login.php');

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $isi = $_POST['isi'];
    $tanggal = date('Y-m-d');

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    if ($gambar != '') {
        move_uploaded_file($tmp, "../uploads/" . $gambar);
    }

    mysqli_query($conn, "INSERT INTO berita VALUES(
        NULL,
        '$judul',
        '$kategori',
        '$isi',
        '$gambar',
        '$tanggal'
    )");

    header('Location: dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Berita</title>
<style>
body{
    font-family:Arial;
    background:#f2f4f7;
    margin:0;
}
.header{
    color:white;
    background:#0a2647;
    padding:15px 30px;
}
.container{
    display:flex;
    padding:30px;
    justify-content:center;
}
.form-box{
    width:600px;
    background:white;
    border-radius:10px;
    padding:25px;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}
h2{
    margin-bottom:20px;
    margin-top:0;
}
label{
    margin-bottom:5px;
    display:block;
    font-weight:bold;
}
input, select, textarea{
    padding:10px;
    width:100%;
    border-radius:5px;
    margin-bottom:15px;
    font-size:14px;
    border:1px solid #ccc;
}
textarea{
    min-height:120px;
    resize:vertical;
}
.btn{
    color:white;
    background:#0a2647;
    padding:10px 15px;
    border-radius:5px;
    border:none;
    font-size:14px;
    cursor:pointer;
}
.btn-back{
    text-decoration:none;
    background:#7f8c8d;
    padding:10px 15px;
    color:white;
    margin-right:10px;
    border-radius:5px;
}
.actions{
    justify-content:flex-end;
    display:flex;
}
</style>
</head>
<body>

<div class="header">
    <h3>Tambah Berita</h3>
</div>

<div class="container">
    <div class="form-box">
        <h2>Form Tambah Berita</h2>

        <form method="POST" enctype="multipart/form-data">
        <label>Judul Berita</label>
        <input type="text" name="judul" required>

        <label>Kategori</label>
        <select name="kategori">
            <option value="tekno">Tekno</option>
            <option value="travel">Travel</option>
        </select>

        <label>Isi Berita</label>
        <textarea name="isi" required></textarea>

        <label>Gambar</label>
        <input type="file" name="gambar" accept="image/*">

        <div class="actions">
            <a href="dashboard.php" class="btn-back">Kembali</a>
            <button class="btn" name="simpan">Simpan</button>
        </div>
        </form>
    </div>
</div>

</body>
</html>
