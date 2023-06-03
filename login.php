<?php 
session_start();
unset($_SESSION['admin_Email']);
unset($_SESSION['admin_Password']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe5ac;
        }

        h1 {
            text-align: center;
            color: #694a08;
            margin-top: 50px;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        label {
            font-weight: bold;
            color: #694a08;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #895e00;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #694a08;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }

        .logo {
            text-align: center;
            margin-top: 30px;
        }

        .logo img {
            max-width: 150px;
        }
    </style>
</head>

<body>
    <div class="logo">
        <img src="images/image-removebg-preview (2).png" alt="Company Logo">
    </div>
    <h1>Admin Login</h1>
    <form action="verify.php" method="post">
        <label for="user_Email">Email</label><br>
        <input type="text" name="user_Email" id="user_Email" required><br><br>

        <label for="user_Password">Password</label><br>
        <input type="password" name="user_Password" id="user_Password" required>
        <?php
        if (isset($_SESSION['login_error'])) {
            echo '<p class="error-message">' . $_SESSION['login_error'] . '</p>';
            unset($_SESSION['login_error']);
        }
        ?>
        <br><br>

        <input type="submit" value="Login"><br><br><br>
    </form>

</body>

</html>
