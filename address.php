<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>address</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
    <form name="form1" method="POST" action="insert_cart.php" enctype="">
        <div class="row">
            <div class="col-mb-6">
                <div class="alert alert-success" h4 role="alert">
                ที่อยู่สำหรับจัดส่งสินค้า
                </div>
                ชื่อ-นามสกุล :
                <input type="text" name="cus_name" class="form-control" required placeholder="ชื่อ-นามสกุล"><br>
                ที่อยู่ :
                <textarea  name="cus_add" class="form-control" rows="3" required placeholder="ที่อยู่"> </textarea><br>
                เบอร์โทร :
                <input type="number" name="cus_tel" class="form-control" required placeholder="เบอร์โทร"><br>
                <button type="submit" class="btn btn-outline-success">ตกลง</button>
                <button type="reset" class="btn btn-outline-danger" value="cancel">ยกเลิก</button>
    </form> 
            </div>
        </div>
    </div>
    

</body>
</html>