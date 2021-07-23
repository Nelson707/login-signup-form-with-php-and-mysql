<?php


session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD']== "POST")
{
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        //read from database
        $query = "SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1";

        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] === $password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo"Enter valid credentials!";
    }
    else
    {
        echo"Enter valid information!";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>login</title>
</head>
<body>
    <div id="box">
        <form action="#" method="POST">
            <div style="font-size: 20px; margin: 10px;">Login</div>
            <input id="text" type="text" name="user_name" placeholder="username" required>
            <input id="text" type="password" name="password" placeholder="password" required>
            <input id="button" type="submit" value="login">
            <a href="signup.php">Sign Up</a>
        </form>
    </div>
</body>
</html>
