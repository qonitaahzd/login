<?php
session_start();
require_once "../config/database.php";
 
if (isset($_SESSION['admin_id'])) { 
    header("Location: ../dashboard/index.php"); 
    exit; 
} 
 
$error = ""; 
 
if ($_SERVER["REQUEST_METHOD"] === "POST") { 
 
    $email = trim($_POST["email"] ?? ""); 
    $password = $_POST["password"] ?? ""; 
 
    if (empty($email) || empty($password)) { 
 
        $error = "Email dan password wajib diisi."; 
 
    } else { 
 
        $sql = "SELECT * FROM admins WHERE email = :email LIMIT 1"; 
 
        $stmt = $pdo->prepare($sql); 
        $stmt->execute([ 
            "email" => $email 
        ]); 
 
        $admin = $stmt->fetch(); 
 
        if ($admin && password_verify($password, $admin["password"])) { 
 
            // Regenerate session ID untuk keamanan 
            session_regenerate_id(true); 
 
            $_SESSION["admin_id"] = $admin["id"]; 
            $_SESSION["admin_name"] = $admin["name"]; 
            $_SESSION["admin_email"] = $admin["email"]; 
 
            header("Location: ../dashboard/index.php"); 
            exit; 
 
        } else { 
 
            $error = "Email atau password salah."; 
 
        } 
    } 
} 
 
?> 
 
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="login-wrapper">

    <div class="welcome-section">

        <div class="logo">
            ◉
        </div>

        <h1>WELCOME BACK</h1>

        <p>
            Login untuk melanjutkan<br>
            ke sistem administrator
        </p>

        <div class="line"></div>

    </div>


    <div class="login-card">

        <div class="login-header">

            <h2>Admin Login</h2>

            <p>
                Silakan login untuk melanjutkan
            </p>

        </div>


        <?php if (!empty($error)): ?>

        <div class="alert-error">
            <?= htmlspecialchars($error) ?>
        </div>

        <?php endif; ?>


        <form method="POST" action="">

            <div class="form-group">

                <label>Email</label>

                <input 
                    type="email"
                    name="email"
                    placeholder="Masukkan email"
                    required
                >

            </div>


            <div class="form-group">

                <label>Password</label>

                <div class="password-wrapper">

                    <input 
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                    >

                    <button 
                        type="button"
                        class="toggle-password"
                        id="togglePassword">
                        👁
                    </button>

                </div>

            </div>


            <button 
                type="submit"
                class="btn-login">
                LOGIN →
            </button>


        </form>


        <div class="secure-text">
            Secure Administrator Access
        </div>


    </div>

</div>


<script src="../assets/js/login.js"></script>

</body>
</html>