<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            height: 100vh;
            display: inline-block;
            align-items: center;
        }
        .message-box {
            text-align: center;
            font-size: 30px;
            background-color: rgba(255, 0, 0, 0.2);
            border: 1px solid #ff0000;
            padding: 10px;
            margin-bottom: 10px;
            box-shadow: 0 0 7px rgba(0, 0, 0, 0.5);
        }
        .login-box {
            width: 550px;
            margin: 150px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 5px 7px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.8);
        }
        .redirect-link{
            text-decoration: none;
            text-align: center;
            margin-top: 20px;
        }
        .redirect-link:hover{
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
<div class="login-box">
<?php
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginUsername = $_POST["username"];

    $stmt = $pdo->prepare("SELECT result FROM register WHERE username = ?");
    $stmt->execute([$loginUsername]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Username found in database
        $result = $row['result'];
        if ($result === 'Real') {
            // Genuine Account
            header("Location: ../Contents/Home.html");
            exit(); // Stop further execution
        } else {
            // Fake account
            echo '<div class="message-box">Fake Account!!<br> Logged Out</div>';
            echo '<a href="login.php" class="redirect-link"><h2>Click here to Login again</h2></a>';
            echo '<a href="register.php" class="redirect-link"><h2>Click here to Register again</h2></a>';
            // Redirect to login.php
        }
    } else {
        // Username not found in database
        echo '<div class="message-box">Invalid Username!!</div>';
        echo '<a href="register.php" class="redirect-link"><h2>Don\'t have an account? Register first!!</h2></a>';
        exit(); // Stop further execution
    }
}
?>
</div>
</div>
</body>
</html>
