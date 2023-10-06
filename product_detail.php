<?php
include 'condb.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail</title>
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <!-- fonts links -->
</head>
<body>
<div class="container">
<div class="row">
<?php
    $ids=$_GET['id'];
    $sql = "SELECT * FROM product, type WHERE product.type_id= type.type_id and product.pro_id='$ids' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    ?>
    <div class="col-md-4">
    <img src="image/<?=$row['image']?>" width="350px"/>
    </div>
    <div class="col-md-6">
    <p><h2>รหัสสินค้า:<?=$row['pro_id']?></h2></p>
            <h3 class="text-">ชื่อสินค้า:<?=$row['pro_name']?></h3>
            <h3>ประเภทสินค้า : <?=$row['type_name']?></h3>
            <h3>รายละเอียด : <?=$row['detail']?></h3>
            <h2><b class="text-danger" ><?=number_format($row['price'])?></b> บาท
            <p><a class="btn btn-outline-success mt-3" href="order.php?id=<?=$row['pro_id']?>"> เพิ่มสินค้า</a></p>
    </div>
</div>
</div>
<?php
mysqli_close($conn);
?>
</body>
</html>