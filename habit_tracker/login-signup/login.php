<?php
session_start();
include '../dbcon.php';
if(isset($_POST['btn']) )
{
    $username=$_POST['user'];
    $password=$_POST['password'];
    $sql="select * from user where username='{$username}' and password='{$password}'";
    if(!mysqli_num_rows(mysqli_query($conn,$sql)))
    {
        echo '<h3>Incorrect username or password</h3>';
    }
    else
    {
        $_SESSION["username"] = $username;
        header("Location:../homepage");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2><a href="signup.php">Sign Up</a></h2>
    <center><h1>Login</h1></center>
    <div class="container">
    <form action="login.php" method="post">
       <input type="text" id="user" name="user" placeholder="Username"><br><br>
       <input type="password" id="password" name="password" placeholder="Password"><br><br>
                      <input type="submit" value="Login" id="btn" name="btn">
        </form>
    </div>
</body>
</html>