<?php 
session_start();
include 'condb.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Bootstrap CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <!-- Option 1: Bootstrap Bundle with Popper -->
<script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
</head>
<body>

<br><br>
    <div class="container">
    <form id="form1" method="POST" action="insert_cart.php">
    <div class ="row">
        <div class ="col-md-10">
        <div class=" h4" role="alert">
    การสั่งซื้อสินค้า
</div>
        <table class="table table-striped table-hover">
        <tr>
            <th>ลำดับที่</th>
            <th>ชื่อสินค้า</th>
            <th>ราคาสินค้า</th>
            <th>จำนวนสินค้า</th>
            <th>ราคารวม</th>
            <th>เพิ่ม - ลด</th>
            <th>ลบสินค้า</th>
        </tr>
<?php
$Total = 0;
$sumPrice = 0;
$m = 1;
for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
    if(($_SESSION["strProductID"][$i]) != ""){
    $sql1="select * from product where pro_id = '" . $_SESSION["strProductID"][$i] . "' " ;
    $result1 = mysqli_query($conn,$sql1);
    $row_pro = mysqli_fetch_array($result1);

    $_SESSION["price"] = $row_pro['price'];
    $Total = $_SESSION["strQty"][$i];
    $sum = $Total * $row_pro['price'];
    $sumPrice = $sumPrice + $sum;
    $_SESSION["sum_price"] = $sumPrice ;

?>
        <tr>
            <td><?=$m?></td>
            <td>
                <img src="image/<?=$row_pro['image']?>" width="80" height="100" class="border">
                <?=$row_pro['pro_name']?>
            </td>
            <td><?= number_format ($row_pro['price'])?></td>
            <td><?=$_SESSION["strQty"][$i]?></td>
            <td><?= number_format ($sum)?></td>
            <td>
            <?php
               // Assuming $row_pro is the current product's data
            $productID = $row_pro['pro_id']; // Product ID

              // Retrieve product information from the database
            $sql_product = "SELECT * FROM product WHERE pro_id = '$productID'";
            $result_product = mysqli_query($conn, $sql_product);
            $row_product = mysqli_fetch_assoc($result_product);

            $maxStock = $row_product['amount']; // Maximum available stock

            if ($_SESSION["strQty"][$i] < $maxStock) {
    echo '<a href="order.php?id=' . $row_pro['pro_id'] . '" class="btn btn-success">+</a>';
}
            if ($_SESSION["strQty"][$i] > 1) {
    echo '<a href="order_delete.php?id=' . $row_pro['pro_id'] . '" class="btn btn-danger">-</a>';
}
?>
            </td>
            <td class=""><a href="pro_delete.php?Line=<?=$i?>" class="btn btn-danger" onclick="del(this.href); return false;" >ลบ</a></td> 
        </tr>
<?php
    $m=$m+1;
}
}
?> 
<tr>
<td class="text-end" colspan="5">รวมเป็นเงิน</td>   
<td class="text-center"><?= number_format($sumPrice)?></td>
<td>บาท</td> 
</tr>

</table>
<div style="text-align:right">
<a href ="index.php"> <button type="button" class="btn btn-outline-secondary">เลือกสินค้า</button> </a>
<a href="address.php"><button type="button" class="btn btn-outline-success">ที่อยู่การจัดส่ง</button></a>
</div>
    </div>

    
</from>

</div>    
</body>
</html>
    <script>
        function del(mypage){
            var agree=confirm('ต้องการลบหรือไม่');
            if(agree){
                window.location=mypage;
            }
        }
    </script>