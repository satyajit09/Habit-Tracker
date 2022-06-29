<?php
include '../dbcon.php';
$habit=$_POST['habit'];
$username=$_POST['username'];
$sql="INSERT INTO `habits` (`id`, `username`, `habit`) VALUES (NULL, '{$username}', '{$habit}');";
if(mysqli_query($conn,$sql))
{
    echo '1';
}
else echo '0';
?>