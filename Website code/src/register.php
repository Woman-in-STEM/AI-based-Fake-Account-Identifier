<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body{
            background-color: darkcyan;
            color: white;
        }
        * {
            box-sizing: border-box;
        }
        .container {
            padding: 16px;
        }
        input,#profilePic {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input:focus
         {
            background-color: #ddd;
            outline: none;
        }

        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        .registerbtn {
            background-color: darkgreen;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
            font-size: 25px;
        }

        .registerbtn:hover {
            opacity: 1;
        }
        a {
            color: dodgerblue;
        }
        .signin {
            background-color: #f1f1f1;
            text-align: center;
            color:darkcyan;
        }
    </style>
</head>
<body>
    <form action="register_db.php" method="post">
        <div class="container">
            <center><h1 style="color: lightpink;font-family: serif;font-size: 50px;">Register</h1></center>
            <p style="color: lavender;font-size: 30px;">Please fill in this form to create an account.</p>
            <hr>
    <label for="username" style="font-size: 25px;">Username:</label><br>
    <input type="text" id="username" name="username" required><br><br>
    
    <label for="password" style="font-size: 25px;">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    
    <label for="usernameToCheck" style="font-size: 25px;">Username to Check:</label><br>
    <input type="text" id="usernameToCheck" name="usernameToCheck"><br><br>
    
    <label for="following" style="font-size: 25px;">Following:</label><br>
    <input type="number" id="following" name="following" min="0"><br><br>
    
    <label for="followers" style="font-size: 25px;">Followers:</label><br>
    <input type="number" id="followers" name="followers" min="0"><br><br>
    <br>
    <label for="profilePic" style="font-size: 25px;">Profile Picture:</label><br>
    <select id="profilePic" name="profilePic">
        <option value=""></option>
        <option value="NoProfilePic">No profile pic</option>
        <option value="LowResolutionPic">Low scrapped resolution pic</option>
        <option value="SomeAIManWoman">Some AI man/woman</option>
        <option value="GenuineHighResolution">A genuine high resolution image</option>
    </select><br><br>
    <br>
    <label for="Bio" style="font-size: 25px;">Bio:</label>
    <input type="checkbox" id="shortenedUrls" name="shortenedUrls">
    <label for="shortenedUrls" style="color:black;font-size: 20px;">Some shortened urls</label>
    <input type="checkbox" id="cryptoSexualSites" name="cryptoSexualSites">
    <label for="cryptoSexualSites" style="color:black;font-size: 20px;">Crypto & Sexual sites links</label>
    <input type="checkbox" id="randomEmojis" name="randomEmojis">
    <label for="randomEmojis" style="color:black;font-size: 20px;">Random emojis</label>
    <input type="checkbox" id="genuineDescription" name="genuineDescription">
    <label for="genuineDescription" style="color:black;font-size: 20px;">Some genuine description</label><br><br>
            <hr>
            <p style="font-size: 30px;text-align: center;">By creating an account you agree to our <a href="#" style="text-decoration: none;color:indigo;"><u>Terms & Privacy</u></a>.</p>
            <input type="submit" value="Register" class="registerbtn">
        </div>
        <div class="container signin">
            <p style="font-size: 30px;">Already have an account? <a href="login.php">Sign in</a>.</p>
        </div>
    </form>
</body>
</html>
