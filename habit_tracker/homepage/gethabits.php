<?php
include '../dbcon.php';
$username=$_POST['username'];
$sql="select * from habits where username='$username'";
if(!mysqli_query($conn,$sql))
{
   echo '0';
}
else 
{
    $result=mysqli_query($conn,$sql);
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}
?>