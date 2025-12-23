<?php
session_start();
include '../config/koneksi.php';

$error = '';
if (isset($_POST['login'])) {
    $u = $_POST['username'];
    $p = md5($_POST['password']);

    $q = mysqli_query($conn, "SELECT * FROM users WHERE username='$u' AND password='$p'");
    if (mysqli_num_rows($q) > 0) {
        $_SESSION['admin'] = true;
        header('Location: dashboard.php');
    } else {
        $error = 'Username atau password salah';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <style>
        body{
        background:#f2f4f7;
        font-family:Arial;
        display:flex;
        justify-content:center;
        align-items:center;
        height:100vh;
        }
        .login-box{
        background:white;
        padding:30px;
        width:320px;
        border-radius:10px;
        box-shadow:0 10px 30px rgba(0,0,0,.1);
        }
        h2{text-align:center;margin-bottom:20px}
        input{
        width:100%;
        padding:10px;
        margin-bottom:15px;
        border:1px solid #ccc;
        border-radius:5px;
        }
        button{
        width:100%;
        padding:10px;
        background:#0a2647;
        color:white;
        border:none;
        border-radius:5px;
        cursor:pointer;
        }
        .error{
        background:#ffe0e0;
        color:#900;
        padding:8px;
        margin-bottom:10px;
        border-radius:5px;
        text-align:center;
        }
    </style>
    </head>
    <body>

<div class="login-box">
    <h2>Admin Login</h2>

    <?php if($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Login</button>
    </form>
</div>

</body>
</html>
