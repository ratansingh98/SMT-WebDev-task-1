<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="./Style/Style_Form.css">

</head>
<body class="bdy" >
    <h2 align="center"><hr size=5px><u>Please Fill up the Form</u><hr size=5px></h2>
    <form class="form-style-5" method="post" enctype="multipart/form-data">
    <label>First Name:- <input type="text" name="first_name"  class="gap" placeholder="Enter first name"></input> </label>
    <label>Last Name:-  <input type="text" name="last_name" class="gap" placeholder="Enter Last name"></input> </label>
    <label >Email ID:-  <input type="text" name="mail" class="gap" placeholder="Enter Email ID"></input> </label>
    <label >Password:-  <input type="password" name="pwd" class="gap" placeholder="Enter Password"></input> </label>
    <br>
    <label>Date of birth:-<input type="date" name="dob" class="gap"></label>
    <br>
    <label>Gender:-</label>
    <input type="radio" class="gap" name="gender" value="Male">Male</input>
    <input type="radio" class="gap" name="gender" value="Female">Female</input><br>
    <label>Hobbies:- </label>
    <input type="checkbox" class="gap" name="hobby[]" value="Reading">Reading</input>
    <input type="checkbox" class="gap" name="hobby[]" value="Farming">Farming</input>
    <input type="checkbox" class="gap" name="hobby[]" value="fishing">Fishing</input><br>
    <input type="checkbox" class="gap" name="hobby[]" value="Swimming">Swimming</input>
    <input type="checkbox" class="gap" name="hobby[]" value="Programming">Programming</input>
    <input type="checkbox" class="gap" name="hobby[]" value="Games">Video Games</input><br>
<label>Photo: </label>
    <input type="file" accept="image/*" class="browse btn btn-default" name="profile"></input>
    <label>Select Your City</label>
    <select name="city">
        <option value="New Delhi">New Delhi</option>
        <option value="Mumbai">Mumbai</option>
        <option value="Nagpur">Nagpur</option>
        <option value="Pune">Pune</option>
        <option value="Hyderabad">Hyderabad</option>
        <option value="Banglore">Banglore</option>
    </select>
<br><br><br>
<div class="bg">
<input type="submit" class="btn submit btn-primary" value="submit" name="s"></input>
</div><br><br><br>
  </form>
  <br><br><br><br>

<?php
if(isset($_POST['s'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['mail'];
    $pwd=$_POST['pwd'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $hobbies=implode(",",$_POST['hobby']);
    $img=$_FILES['profile']['name'];
    $timg=$_FILES['profile']['tmp_name'];
    $img_size=$_FILES['profile']['size'];
    $store="uploads/".$img ;
    move_uploaded_file($timg,$store);
    $city=$_POST['city'];
    $conn= mysqli_connect("localhost","root","","form");
    $sql="insert into info(Fname,Lname,dob,gender,hobbies,dp,place,email,password)Values
    ('$first_name','$last_name','$dob','$gender','$hobbies','$img','$city','$email','$pwd')";
    $res=mysqli_query($conn,$sql);
    if($res==TRUE)
    {
        echo "success";
        header("location:Login.php");
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
