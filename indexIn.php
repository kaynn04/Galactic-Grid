<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

// Access user information including full name
$firstName = isset($_SESSION["first_name"]) ? $_SESSION["first_name"] : '';
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
    <main class="menu">
        <h2>GALACTIC GRID</h2>

        <div class="user-dropdown">
            <p style="font-size: 20px;">Hello, <b style="color: rgb(25, 0, 255);font-size: 20px;"><?php echo htmlspecialchars($firstName); ?></b><span style="margin-left: 5px">!</span></p>
        </div>

        <div class="play">
            <button class="start" onclick="location.href='chooseIn.php'"><b>Start</b></button>
            <button class="history" onclick="location.href='history.php'"><b>History</b></button>
        </div>
        <button class="logout" onclick="location.href='logout.php'">Log Out</button>
    </main>

    <footer class="footer">
        <p>Made by: Barallas, Limpin, Manlagnit, Miki, Oclares</p>
    </footer>
    <script src="starbg.js" type="module"></script>
    <script src="audiobg.js"></script>
</body>
</html>