<?php
ob_start(); // Turn on output buffering
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
   exit; // Add an exit after header redirect
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <body>
    <canvas id="canvas"></canvas>
    <div class="reg_container">
        <?php
        if (isset($_POST["submit"])) {  
           $lastName = $_POST["last_name"];
           $firstName = $_POST["first_name"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($lastName) OR empty($firstName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           } else {
            
    $sql = "INSERT INTO users (last_name, first_name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt, "ssss", $lastName, $firstName, $email, $passwordHash);
    mysqli_stmt_execute($stmt);
    
        echo "<div class='alert alert-success'>You are registered successfully.</div>";
    
    // Introduce a slight delay (0.5 seconds) before redirection
        sleep(0.5);
                
    // Redirect to index.php
        header("Location: index.php?registration=success");
        exit; // Exit to prevent further execution

} else {
    die("Something went wrong");
}

           }
        }
        ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="first_name" placeholder="First Name:" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p class="register" >Already Registered? <a href="login.php">Login Here</a></p></div>
        <div><p class="register">Just Play as Guest? <a href="choose.php">Lets go!</a></p></div>
      </div>
    </div>

    <script src="starbg.js" type="module"></script>
    <script src="audiobg.js"></script>
</body>
</html>
<?php
ob_end_flush(); // Flush the output buffer and turn off output buffering
?>
