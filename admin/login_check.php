<?php
include 'condb.php';
session_start();
$user=$_POST['username'];
$password=$_POST['password'];
//sha512
$password=hash('sha512',$password);

$sql="SELECT * FROM member WHERE username='$user' and password ='$password' ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$status=$row['status'];
if($row > 0){
    $_SESSION["username"]=$row['username'];
    $_SESSION["password"]=$row['password'];
    $_SESSION["userid"]=$row['id'];
    $_SESSION["name"]=$row['name'];
    $_SESSION["lastname"]=$row['lastname'];
    if($status == '0'){
        $show=header("location:index.php");
    }elseif($status == '1'){
        $show=header("location:index1.php");
    }
}else{
    $_SESSION["Error"] = "<p>your username or password is invalid </p>";
    $show=header("location:login.php");
}
echo $show;
?>