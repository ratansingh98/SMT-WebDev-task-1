<?php
$id=$_GET['id'];
$conn= mysqli_connect("localhost","root","","form");
$sql=mysqli_query($conn,"Select * from info where id='$id'");
$row=mysqli_fetch_array($sql);
$hobby=$row['Hobbies'];
$n=explode(",",$hobby);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="./Style/Style_edit.css">

</head>
<body class="bdy" >
    <div align="right" class="righ"><a href="logout.php" ><u>Log Out</u></a>
  </div>
    <h2 align="center"><hr size=5px><u>Edit your form</u><hr size=5px></h2>
    <form class="form-style-5" method="post" enctype="multipart/form-data">
    <label>First Name:- <input type="text" name="first_name" class="gap" value="<?php echo $row[1]?>"  ></input> </label>
    <label>Last Name:-  <input type="text" name="last_name" class="gap"  value="<?php echo $row[2]?>" ></input> </label>
    <label >Email ID:-  <input type="text" name="mail" class="gap"     value="<?php echo $row[8]?>" ></input> </label>
    <label >Password:-  <input type="password" name="pwd" class="gap" value="<?php echo $row[9]?>" ></input> </label>
    <br>
    <label>Date of birth:-<input type="date" name="dob" class="gap" value="<?php echo $row[3]?>"></label>
    <br>
    <label>Gender:-</label>
    <input type="radio" class="gap" name="gender" value="Male" <?php if($row[4]=="Male"){echo 'checked=:checked';}?> >Male</input>
    <input type="radio" class="gap" name="gender" value="Female" <?php if($row[4]=="Female"){echo 'checked=:checked';}?>>Female</input><br>
    <label>Hobbies:- </label>
    <input type="checkbox" class="gap" name="hobby[]" value="Reading" <?php if(in_array('Reading',$n)){echo 'checked=:checked';}?>>Reading</input>
    <input type="checkbox" class="gap" name="hobby[]" value="Farming"<?php if(in_array('Farming',$n)){echo 'checked=:checked';}?>>Farming</input>
    <input type="checkbox" class="gap" name="hobby[]" value="fishing"<?php if(in_array('fishing',$n)){echo 'checked=:checked';}?>>Fishing</input><br>
    <input type="checkbox" class="gap" name="hobby[]" value="Swimming"<?php if(in_array('Swimming',$n)){echo 'checked=:checked';}?>>Swimming</input>
    <input type="checkbox" class="gap" name="hobby[]" value="Programming"<?php if(in_array('Programming',$n)){echo 'checked=:checked';}?>>Programming</input>
    <input type="checkbox" class="gap" name="hobby[]" value="Games"<?php if(in_array('Games',$n)){echo'checked=:checked';}?>>Video Games</input><br>
    <label>Select Your City</label>
    <select name="city" >
        <option <?php if($row[7]=="New Delhi"){echo 'selected=:selected';}?> >New Delhi</option>
        <option <?php if($row[7]=="Mumbai"){echo 'selected=:selected';}?>>Mumbai</option>
        <option <?php if($row[7]=="Nagpur"){echo 'selected=:selected';}?>>Nagpur</option>
        <option <?php if($row[7]=="Pune"){echo 'selected=:selected';}?>>Pune</option>
        <option <?php if($row[7]=="Hyderabad"){echo 'selected=:selected';}?>>Hyderabad</option>
        <option <?php if($row[7]=="Banglore"){echo 'selected=:selected';}?>>Banglore</option>
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
    $city=$_POST['city'];
    $conn= mysqli_connect("localhost","root","","form");
    $sql="Update info set Fname='$first_name',Lname='$last_name',email='$email',password='$pwd',dob='$dob',Gender='$gender',hobbies='$hobbies',place='$city' where id='$id'";
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
