<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: indexIn.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galactic Grid</title>
    <link rel="stylesheet" href="design.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&family=Protest+Guerrilla&family=Protest+Riot&display=swap" rel="stylesheet">
</head>
<body>
    <div class="volume-container">
        <input class="volumeSlider" type="range" id="volumeSlider" min="0" max="1" step="0.01" value="1">
        <p>Volume</p>
    </div>

    <canvas id="canvas"></canvas>
    <canvas id="canvas"></canvas>
    <main class="menu">
        <h2>GALACTIC GRID</h2>

        <div class="play">
            <button class="loginbutton" onclick="location.href='login.php'"><b>Login</b></button>
            <button class="playasguest" onclick="location.href='choose.php'"><b>Play as Guest</b></button>  
        </div>

        <div class="registration"><p>Not Registered yet? <a href="registration.php">Register here</a></div>
    </main>

    <footer class="footer">
        <p>Made by: Barallas, Limpin, Manlagnit, Miki, Oclares</p>
    </footer>


    <script src="starbg.js" type="module"></script>
    <script src="audiobg.js"></script>
</body>
</html>
