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


<div class="dashboard-wrapper">


    <nav class="dashboard-nav">

        <div class="brand">
            ◉ Admin Panel
        </div>


        <a href="../auth/logout.php" class="logout-btn">
            Logout
        </a>

    </nav>



    <main class="dashboard-main">


        <div class="dashboard-card">


            <div class="profile-icon">
                👤
            </div>


            <h1>
                Welcome,
                <?= htmlspecialchars($adminName) ?>
            </h1>


            <p>
                Anda berhasil login ke sistem administrator.
            </p>


            <div class="account-box">

                <span>Email</span>

                <strong>
                    <?= htmlspecialchars($adminEmail) ?>
                </strong>

            </div>


        </div>


    </main>


</div>


</body>
</html>