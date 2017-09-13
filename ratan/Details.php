<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="./Style/Style_details.css">
</head>
<body class="bdy">
 <div align="right" class="righ"><a href="logout.php" ><u>Log Out</u></a>
  </div>
  <br>
   <h2 align="center"><u>Your Details are</u></h2>
   <br><br>
   <div width=100%  class="footer" align="center">@2017, All rights reserved.Created By Ratan Singh. </div>
    <?php
        session_start();
    $email=$_SESSION['email'];
    $pass=$_SESSION['pass'];
     $conn= mysqli_connect("localhost","root","","form");
            $sql="SELECT * FROM info";
            $res=mysqli_query($conn,$sql);
            $i=0;

    ?> 

      <table border="2" align="center">
          <tr><td><b>First name</b></td>
          <td><b>Last name</b></td>
          <td><b>Date of Birth</b></td>
          <td><b>Gender</b></td>
          <td><b>Hobbies</b></td>
          <td><b>Prolile pic</b></td>
              <td><b>Place</b></td>
              <td><b>Email</b></td>
            <td><b>Action</b></td>
            <td><b>Action</b></td></tr>
          <?php   while($row=mysqli_fetch_row($res)) { ?>
            <tr>
            <td><?php echo $row[1] ?></td>
            <td><?php echo $row[2] ?></td>
            <td><?php echo $row[3] ?></td>
            <td><?php echo $row[4] ?></td>
            <td><?php echo $row[5] ?></td>
            <td><?php echo $row[6] ?></td>
            <td><?php echo $row[7] ?></td>
            <td><?php echo $row[8] ?></td>
            <td><a href="edit.php?id=<?php echo $row[0]; ?>">EDIT</a></td>
            <td><a href="delete.php?id=<?php echo $row[0]; ?>">Delete</a ></td>
            </tr>
            
          <?php  } ?>
              </table>

</body>
</html>