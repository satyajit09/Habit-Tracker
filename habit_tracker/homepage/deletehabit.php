<?php
include '../dbcon.php';
$habit=$_POST['habit'];
$username=$_POST['username'];
$sql1="delete from habits where username='{$username}' and habit='{$habit}'";
$sql2="delete from months where username='{$username}' and habit='{$habit}'";
if(mysqli_query($conn,$sql1) && mysqli_query($conn,$sql2))
{
    echo '1';
}
else echo '0';
?>