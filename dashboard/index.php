<?php 
 
session_start(); 
 
 
// Cek apakah admin sudah login 
 
if (!isset($_SESSION["admin_id"])) { 
 
    header("Location: ../auth/login.php"); 
 
    exit; 
} 
 
 
$adminName = $_SESSION["admin_name"]; 
 
$adminEmail = $_SESSION["admin_email"]; 
 
?> 
 
<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin</title>

<link rel="stylesheet" href="../assets/css/style.css">

</head>


<body>


<div class="dashboard">


<nav class="navbar">

    <h2>
        Admin Panel
    </h2>

    <a href="../auth/logout.php">
        Logout
    </a>

</nav>



<div class="dashboard-content">


<div class="admin-card">


<div class="avatar">
    👤
</div>


<h1>
    Selamat Datang,
    <?= htmlspecialchars($adminName) ?>
</h1>


<p>
    Anda berhasil login ke sistem administrator.
</p>



<div class="info">


<div>
    <small>Nama Administrator</small>
    <strong>
        <?= htmlspecialchars($adminName) ?>
    </strong>
</div>


<div>
    <small>Email</small>
    <strong>
        <?= htmlspecialchars($adminEmail) ?>
    </strong>
</div>


</div>



</div>


</div>


</div>


</body>
</html>