<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
            background-color: rgba(0, 255, 0, 0.2);
            border: 1px solid #00ff00;
            padding: 10px;
            margin-bottom: 10px;
            box-shadow: 0 0 7px rgba(0, 0, 0, 0.5);        
        }
        .login-box {
            width: 750px;
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
    $username = $_POST["username"];
    $password = $_POST["password"];
    $usernameToCheck = $_POST["usernameToCheck"];
    $followers = $_POST["followers"];
    $following = $_POST["following"];
    $profilePic = isset($_POST["profilePic"]) ? $_POST["profilePic"] : "";
    $bioOptions = "";
    if (isset($_POST["shortenedUrls"])) {
        $bioOptions .= "Shortened URLs ";
    }
    if (isset($_POST["cryptoSexualSites"])) {
        $bioOptions .= "Crypto & Sexual sites links ";
    }
    if (isset($_POST["randomEmojis"])) {
        $bioOptions .= "Random emojis ";
    }
    if (isset($_POST["genuineDescription"])) {
        $bioOptions .= "Genuine description ";
    }
    
    // Determining result based on conditions
    if (abs($following - $followers) > 200 || in_array($profilePic, ["NoProfilePic", "LowResolution", "AIManWoman"]) || $bioOptions !== "genuineDescription") {
        $result = "Fake";
    }
    if (abs($following - $followers) <= 200 || in_array($profilePic, ["GenuineHighResolution"]) || $bioOptions === " genuineDescription") {
        $result = "Real"; // Default result
    }
    $stmt = $pdo->prepare("INSERT INTO register (username, password, username_to_check, followers, following, profile_pic_option, bio_options, result) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->execute([$username, $password, $usernameToCheck, $followers, $following, $profilePic, $bioOptions, $result]);

    echo '<div class="message-box">Registration Successful!!</div>';
    echo '<a href="../index.html" class="redirect-link"><h2>Go back to the first page!!<br>If already Registered please Login!</h2></a>';
}
?>
</div>
</div>
</body>
</html>