<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select difficulty</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <canvas id="canvas"></canvas>
    <main class="menu">
        <h2>SELECT DIFFICULTY</h2>

        <div class="play">
            <button class="easy" onclick="location.href='gameAi.php?difficulty=easy'">Easy</button>
            <button class="diff" onclick="location.href='gameAi.php?difficulty=difficult'">Difficult</button>
            <button class="expert" onclick="location.href='gameAi.php?difficulty=expert'">Expert</button>
        </div>
        <button class="back" onclick="location.href='choose.php'">Back</button>
    </main>

    <footer class="footer">
        <p>Made by: Barallas, Limpin, Manlagnit, Miki, Oclares</p>
    </footer>


    <script src="starbg.js" type="module"></script>
    <script src="audiobg.js"></script>
</body>
</html>
