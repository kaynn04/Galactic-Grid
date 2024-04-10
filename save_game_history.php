<?php
// save_game_history.php

session_start();

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    // User is not logged in, send a JSON response with an error status
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

$user_id = $_SESSION["user"]["id"];

// Database connection
$mysqli = new mysqli('localhost', 'id21873365_login_register', '1aA!1234', 'id21873365_login_register');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get the data sent from JavaScript
$data = json_decode(file_get_contents('php://input'), true);

// Prepare an SQL statement to save the data
$stmt = $mysqli->prepare("INSERT INTO match_history (user_id, date, opponent, result) VALUES (?, NOW(), ?, ?)");

// Concatenate player score, AI score, and difficulty
$result = $data['_playerScore'] . ':' . $data['_aiScore'];

$opponent = 'AI(' . ($data['_difficulty'] ?? 'unknown') . ')';

// Execute the statement and save the data
$stmt->bind_param("iss", $user_id, $opponent, $result);
$stmt->execute();

// Close the statement and the connection
$stmt->close();
$mysqli->close();

// Send a response back to JavaScript
header('Content-Type: application/json');
echo json_encode(['status' => 'success']);