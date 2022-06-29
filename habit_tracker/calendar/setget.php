<?php
include '../dbcon.php';
$month=$_POST["month_no"];
$username=$_POST["username"];
$habit=$_POST["habit"];
$blank='111111111111111111111111111111111111111111';
$sql1="select * from months where username='{$username}' and habit='{$habit}' and month='{$month}' ";
//$sql2="INSERT INTO `months` (`id`, `month`, `days`) VALUES (NULL, '{$month}', '{$blank}')";
$sql2="INSERT INTO `months` (`id`, `username`, `habit`, `month`, `days`) VALUES (NULL, '{$username}', '{$habit}', '{$month}', '{$blank}')";
$result = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result))
{
    $row=mysqli_fetch_assoc($result);
    echo $row['days'];
}
else
{
    mysqli_query($conn,$sql2);
    $result = mysqli_query($conn,$sql1);
    $row=mysqli_fetch_assoc($result);
    echo $row['days'];
}
?>