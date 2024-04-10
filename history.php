<?php
// Define database connection parameters
$db_host = "localhost";
$db_user = "id21873365_login_register";
$db_password = "1aA!1234";
$db_name = "id21873365_login_register";

// Establish database connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user ID from the session
if (isset($_SESSION["user"])) {
    $user_id = $_SESSION["user"]["id"];
}

// Fetch match history data from the database
$query = "SELECT u.last_name, mh.date, mh.opponent, mh.result FROM match_history mh INNER JOIN users u ON mh.user_id = u.id"; //Add a WHERE mh.user_id = $user_id";
$result = $conn->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galactic Grid Match History</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>

    <h1 class="history">Match History</h1>
    <canvas id="canvas"></canvas>
    <div class="history_div">
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Date</th>
                    <th>Opponent</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Output match history data
                if ($result->num_rows > 0) {
                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                    $rows = array_reverse($rows);
                    foreach ($rows as $row) {
                        $bgColor = "";
                        switch (true) {
                            case (strpos($row['result'], '5:') === 0):
                            $bgColor = "rgba(44, 207, 38, 0.315)";
                            break;
                            case (strpos($row['result'], ':5') > -1):
                            $bgColor = "rgba(207, 38, 38, 0.315)";
                            break;
                        }
                        echo "<tr class='details' style='background-color: " . $bgColor . ";'>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['opponent'] . "</td>";
                        echo "<td>" . $row['result'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr class='details'><td colspan='4'>No match history available</td></tr>";
                }    
                ?>
            </tbody>
        </table>
    </div>
    <button class="back_history" onclick="location.href='indexIn.php'">Back</button>

    <script src="starbg.js" type="module"></script>
    <script src="audiobg.js"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
