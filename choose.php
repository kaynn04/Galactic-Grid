<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <canvas id="canvas"></canvas>
    <main class="menu">
        <h2>CHOOSE MODE</h2>

        <div class="play">
            <button class='playervsplayer' onclick="location.href='pvp.php'"><b>Player vs Player</b></button>
            <button class='playervsai' onclick="location.href='pvai.php'"><b>Player vs AI</b></button>
        </div>
        <button class="back" onclick="location.href='index.php'">Back</button>
    </main>

    <footer class="footer">
        <p>Made by: Barallas, Limpin, Manlagnit, Miki, Oclares</p>
    </footer>


    <script src="starbg.js" type="module"></script>
    <script src="audiobg.js"></script>
</body>
</html>
