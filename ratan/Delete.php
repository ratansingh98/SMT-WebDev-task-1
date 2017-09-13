<?php
$id=$_GET['id'];
$conn= mysqli_connect("localhost","root","","form");
$sql=mysqli_query($conn,"Select DP from info where id='$id'");
$row=mysqli_fetch_array($sql);
unlink("uploads/".$row['DP']); 
$sql1=mysqli_query($conn,"Delete from info where id='$id'");
header("location:logout.php");
?>