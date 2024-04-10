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
    <title>Choose Mode</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <canvas id="canvas"></canvas>
    <main class="menu">
        <h2>CHOOSE MODE</h2>

        <div class="user-dropdown">
            <p style="font-size: 20px;">Hello, <b style="color: rgb(25, 0, 255);font-size: 20px;"><?php echo htmlspecialchars($firstName); ?></b><span class="arrow" style="margin-left: 10px;">▼</span></p>
            <div class="user-dropdown-content">
                <a href="logout.php" class="logout-box">Log Out</a>
            </div>
        </div>

        <div class="play">
            <button class='playervsplayer' onclick="location.href='pvpIn.php'"><b>Player vs Player</b></button>
            <button class='playervsai' onclick="location.href='pvaiIn.php'"><b>Player vs AI</b></button>
        </div>
        <button class="back" onclick="location.href='indexIn.php'">Back</button>
    </main>

    <footer class="footer">
        <p>Made by: Barallas, Limpin, Manlagnit, Miki, Oclares</p>
    </footer>


    <script src="starbg.js" type="module"></script>
    <script src="audiobg.js"></script>
</body>
</html>