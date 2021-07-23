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
        //save to database
        $user_id = random_num(10);
        $query = "INSERT INTO users (user_id,user_name,password) VALUES ('$user_id','$user_name','$password')";

        mysqli_query($con, $query);

        header("location: login.php");
        die;
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

    <title>sign up</title>
</head>
<body>
    <div id="box">
        <form action="#" method="POST">
            <div style="font-size: 20px; margin: 10px;">Sign up</div>
            <input id="text" type="text" name="user_name" placeholder="username">
            <input id="text" type="password" name="password" placeholder="password">
            <input id="button" type="submit" value="sign up">
            <a href="login.php">Log in</a>
        </form>
    </div>
</body>
</html>