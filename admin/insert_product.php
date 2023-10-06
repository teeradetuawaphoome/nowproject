<?php
include 'condb.php';
$p_name = $_POST['pname'];
$typeID = $_POST['typeID'];
$price = $_POST['price'];
$num = $_POST['num'];
$detail = $_POST['detail'];
if (is_uploaded_file($_FILES['file1']['tmp_name'])) { 
    $new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION); 
    $image_upload_path = "../image/".$new_image_name; 
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path); 
    } else { 
    $new_image_name = ""; 
    }
    $sql = " INSERT INTO product(pro_name,type_id,price,amount,detail,image) VALUES('$p_name','$typeID','$price','$num','$detail','$new_image_name')";
    $result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('บันทึกเสร็จสิ้น'); </script>" ;
    echo "<script> window.location='add_product.php'; </script>";
}else{
    echo "<script> alert('บันทึกไม่สำเร็จ'); </script>";
}
?>