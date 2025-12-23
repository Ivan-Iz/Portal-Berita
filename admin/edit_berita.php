<?php session_start(); include '../config/koneksi.php'; $id=$_GET['id']; $b=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM berita WHERE id='$id'"));
if(isset($_POST['update'])){
mysqli_query($conn,"UPDATE berita SET judul='$_POST[judul]',kategori='$_POST[kategori]',isi='$_POST[isi]' WHERE id='$id'"); header('Location: dashboard.php'); }
?>
<form method="POST"><input name="judul" value="<?= $b['judul'] ?>"><select name="kategori"><option>tekno</option><option>travel</option></select><textarea name="isi"><?= $b['isi'] ?></textarea><button name="update">Update</button></form>