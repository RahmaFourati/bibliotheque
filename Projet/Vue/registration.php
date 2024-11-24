<?php
include "../Model/Adherant.php";
include "../Model/Livre.php";
include "../Model/Emprunt.php";
include "../Model/User.php";
include "../Model/Connexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" type="text/css" href="styleRegistation.css">
    <section class="container">
        <div class="Registration-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
                <h1 class="opacity">Registration</h1>
                <form method="get" action="../Controller/controlAuth.php">
                    <input type="text" name="userName" placeholder="USERNAME" />
                    <input type="email" name="email" placeholder="E-MAIL">
                    <input type="tel" name="numTel" placeholder="NUMTELEPHONE">
                    <input type="password" name="pass" placeholder="PASSWORD" />
                    <input type="password" name="ConfirmPass" placeholder="CONFIRMPASSWORD">
                    <button class="opacity" name="btnRegister">REGISTER</button>
                </form>
                <div class="register-forget opacity">
                    <a href="Login.php">LOGIN</a>
                    <a href="Acceuil.php">HOME</a>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
    
</body>
</html>