<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="./Style/Style_login.css">

</head>
<body class="bdy">
<br>
<h2 align="center"><u>Login</u></h2>
<form method="post" class="form-style-5" >
  <div class="container">
    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email ID" name="mail" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required>

    <button type="submit" name="fetch" a>Login</button>
    <a href="Form.php"><h5 ><u>Sign Up</u></h5></a>
  </div>
</form>
<?php
    if(isset($_POST['fetch']))
    {

            $email=$_POST['mail'];
            $pwd=$_POST['pwd'];
            $conn= mysqli_connect("localhost","root","","form");
            $sql="SELECT * FROM info where email = '$email' AND password = '$pwd'";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_row($res);
        if($row[0]!=NULL)
        {
            session_start();
            $_SESSION['email']=$row[8];
            $_SESSION['pass']=$row[9];
           header("location:details.php");
        }
        else{
            echo "Entry does not exist";
            die;
        }
        if($res==TRUE)
    {
        echo "Success";
    }
    else
    {
        echo "error";
    }
    }


?>
<div width=100%  class="footer" align="center">@2017, All rights reserved.Created By Ratan Singh. </div>
</body>

</html>
