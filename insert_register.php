<?php
include 'condb.php';
//รับค่ามาจากregister
$name=$_POST['firstname'];
$lastname=$_POST['lastname'];
$tel=$_POST['telephone'];
$username=$_POST['username'];
$password=$_POST['password'];
//sha512
$password=hash('sha512',$password);

//เพิ่มข้อมูลลงตาราง member
$sql="INSERT INTO member(name,lastname,telephone,username,password,status)
values('$name','$lastname','$tel','$username','$password','0') ";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('เสร็จ');</script>";
    echo "<script> window.location='register.php';</script>";

}else{
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo "<script> alert('บันทึกไม่ได้');</script>";
}
mysqli_close($conn);
?>