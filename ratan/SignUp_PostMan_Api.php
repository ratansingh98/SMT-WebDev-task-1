<?php
$conn= mysqli_connect("localhost","root","","form");
header('Content-Type: application/json');
    $first_name=$_POST['Fname'];
    $last_name=$_POST['Lname'];
    $email=$_POST['email'];
    $pwd=$_POST['password'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $hobbies=implode(",",$_POST['hobbies']);
    $img=$_FILES['dp']['name'];
    $timg=$_FILES['dp']['tmp_name'];
    $img_size=$_FILES['dp']['size'];
    $store="uploads/".$img ;
    move_uploaded_file($timg,$store);
    $city=$_POST['place'];
    $conn= mysqli_connect("localhost","root","","form");
    $sql="insert into info(Fname,Lname,dob,gender,hobbies,dp,place,email,password)Values
    ('$first_name','$last_name','$dob','$gender','$hobbies','$img','$city','$email','$pwd')";
    $res=mysqli_query($conn,$sql);
if($res==TRUE)
{
    $array=['status'=>true,
           'message'=>'successfully Registered',
           'data'
           ];
}
else
{
    $array=['status'=>false,
    'message'=>'login failed'
            ];
}
echo json_encode($array);
?>
