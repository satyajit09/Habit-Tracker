<?php
include '../dbcon.php';
$month=$_POST["month_no"];
$habit=$_POST["habit"];
$username=$_POST["username"];
$id=(int)$_POST["id"];
$sql1="select * from months where username='{$username}' and habit='{$habit}' and month='{$month}'";
$result = mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$days=$row['days'];
if($days[$id]=='1')
    {
        $days[$id]='0';
        echo '0';
    }
else
    { 
        $days[$id]='1';
        echo '1';
    }
$sql2= "update months set days='{$days}' where username='{$username}' and habit='{$habit}' and month='{$month}'";
mysqli_query($conn,$sql2);
?>