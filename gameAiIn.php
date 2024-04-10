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

<html>
	<head>
	<meta charset="UTF-8">
	<title>Galactic Grid</title>
	<meta http-equiv="X-UA-Compatible" content="IE-edge"/>
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="pvp_design.css">

	</head>

	<body>
		<div class="settings-icon" onclick="toggleSettingsMenu()">
			<img src="images/settings-icon.png" alt="Settings">
		</div>

		<div class="settings-menu">
			<a class="type" href="indexIn.php">Home</a>
			<a class="type" href="pvpIn.php">Against Human</a>
			<a class="type" href="pvaiIn.php">Difficulty</a>
			<a class="close-btn" onclick="closeSettingsMenu()">Close Menu</a>
		</div>

		<canvas id="canvas"></canvas>

		<div class="score_board">
			<h2 class="gri" id="player_n"><?php echo $firstName; ?></h2>
			<h1 class="gri" id="vs">VS</h1>
			<h2 class="gri" id="ai_n">AI</h2>
			<h1 class="gri" id="player_score">0</h1>
			<h1 class="gri" id="vs2">|</h1>
			<h1 class="gri" id="ai_score">0</h1>
		</div>
		<div class="container">	
				<div class="cell" id="0"></div>
				<div class="cell" id="1"></div>
				<div class="cell" id="2"></div>
				<div class="cell" id="3"></div>
				<div class="cell" id="4"></div>
				<div class="cell" id="5"></div>
		
				<div class="cell" id="6"></div>
				<div class="cell" id="7"></div>
				<div class="cell" id="8"></div>
				<div class="cell" id="9"></div>
				<div class="cell" id="10"></div>
				<div class="cell" id="11"></div>
			
				<div class="cell" id="12"></div>
				<div class="cell" id="13"></div>
				<div class="cell" id="14"></div>
				<div class="cell" id="15"></div>
				<div class="cell" id="16"></div>
				<div class="cell" id="17"></div>
			
				<div class="cell" id="18"></div>
				<div class="cell" id="19"></div>
				<div class="cell" id="20"></div>
				<div class="cell" id="21"></div>
				<div class="cell" id="22"></div>
				<div class="cell" id="23"></div>
			
				<div class="cell" id="24"></div>
				<div class="cell" id="25"></div>
				<div class="cell" id="26"></div>
				<div class="cell" id="27"></div>
				<div class="cell" id="28"></div>
				<div class="cell" id="29"></div>
		</div>

		<div class="endgame">
			<div class="text"></div>
		</div>

		<script src="baseAI.js"></script>
		<script src="starbg.js" type="module"></script>
		<script src="audiobg.js"></script>
	</body>
</html>
