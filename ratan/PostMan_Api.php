<?php
$conn= mysqli_connect("localhost","root","","form");
header('Content-Type: application/json');
$email=$_POST['email'];
$password=$_POST['password'];
$sql=mysqli_query($conn,"select * from info where email='$email' and password='$password'");
if(mysqli_num_rows($sql)>0)
{
    while($res=mysqli_fetch_assoc($sql))
    {
    $array=['status'=>true,
           'message'=>'successfully login',
           'data'=>$res
           ];
    }
}
else
{
    $array=['status'=>false,
    'message'=>'login failed'
            ];
}
echo json_encode($array);
?>