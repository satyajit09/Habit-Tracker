<?php
include '../dbcon.php';
$username=$_POST['user'];
$date=$_POST['date'];
$password=$_POST['password1'];
$email=$_POST['email'];
$sql="INSERT INTO `user` (`id`, `username`, `dob`, `password`, `email`) VALUES (NULL, '{$username}', '{$date}', '{$password}', '{$email}');";
if(mysqli_query($conn,$sql))
{
    header("Location:login.php");
}
else header("Location:signup.php?error=username_taken");
?>