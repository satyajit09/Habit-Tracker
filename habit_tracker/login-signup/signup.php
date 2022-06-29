<?php
if(isset($_REQUEST['error']))
{
    echo '<center><h3> Username already taken</h3></center>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2><a href="login.php">Login</a></h2>
    <center><h1>Sign Up</h1></center>
    <div class="container">
        <form action="storeinfo.php" method="post" onsubmit="return validateForm()">
        <input type="text" id="user" name="user" placeholder="Username"><br><br>
            <input type="date" id="date" name="date" placeholder="DOB"><br><br>
        <input type="text" id="password1" name="password1" placeholder="Password"><br><br>
        <input type="text" id="password2" name="password2"placeholder="Re-Enter Password"><br><br>
        <input type="text" id="email" name="email" placeholder="Email"><br><br>
                       <input type="submit" value="Sign Up" id="btn">
    </form>
    </div>
</body>
</html>
<script>
    function validateForm()
    {
        var username=document.getElementById("user").value;
        var dob=document.getElementById("date").value;
        var email=document.getElementById("email").value;
        var pass1=document.getElementById("password1").value;
        var pass2=document.getElementById("password2").value;
        if(username==null || username=='')
        {
            alert('fill User Id')
            return false;
        }
        if(username.length<=5 || username.length>=12)
        {
            alert('userid must be of length 5 to 12 characters');
            return false;
        }
        if(pass1==null || pass1=='')
        {
            alert('enter password');
        }
        if(pass2==null || pass2=='')
        {
            alert('re-enter password');
            return false;
        }
        if(pass1!=pass2)
        {
            alert('passwords do not match');
            return false;
        }
        if(email==null || email=='')
        {
            alert('Fill email');
            return false;
        }
        var patterns =/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/
        if(!email.match(patterns))
        {
            alert('enter valid email');
            return false;
        }
        return true;
    }
</script>