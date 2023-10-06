<?php
session_start();
if(!isset($_SESSION["userid"]))
header("location:login.php");
include 'condb.php';
$idpro = 'idpro'; // กำหนดค่าเริ่มต้นให้เป็นสตริงว่าง
if (isset($_GET['id'])) {
    $idpro = $_GET['id'];
    // ทำสิ่งที่ต้องการกับตัวแปร $idpro ที่ได้รับมา
    // เช่น นำไปใช้ในการแก้ไขสินค้าในฐานข้อมูล
} else {
    // ไม่ได้รับค่า 'id' มาใน URL หรือค่า 'id' ไม่ถูกต้อง
    // ดำเนินการที่ควรทำหากไม่มี 'id' หรือค่า 'id' ไม่ถูกต้อง
}
$sql1 = "SELECT * FROM product WHERE pro_id='$idpro'";
$result = mysqli_query($conn,$sql1);
$rs=mysqli_fetch_array($result);
$p_typeID=$rs['type_id'];
?>

?>
<?php include 'condb.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>report_order</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
<?php include 'menu1.php';?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">ข้อมูล</h1>
                    <p class="mb-4"><a target="_blank"
                            href="https://datatables.net"></a></p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">แสดงข้อมูล</h6><br>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <form name="form1" method="post" action="update_product.php" enctype="multipart/form-data">
<label>รหัสสินค้า :</label>
<input type="text" name="proid" class="form-control" readonly value="<?=htmlspecialchars($rs['pro_id'])?>"> <br>   
<label>ชื่อสินค้า :</label>
<input type="text" name="pname" class="form-control" value=<?=$rs['pro_name']?> > <br>
<label>รายละเอียดสินค้า :</label>
<textarea class="form-control" required placeholder="รายละเอียดสินค้า..." name="detail" rows="3"></textarea> <br>
<label>ประเภทสินค้า :</label>
<select class="form-select" name="typeID" > 
<?php
$sql="SELECT * FROM type ORDER BY type_name";
$hand=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($hand)){
    $ttypeID = $row['type_id'];
    ?>   
    <option value="<?=$row['type_id']?>" <?php if($p_typeID==$ttypeID){echo "selected=selected";} ?> >
    <?=$row['type_name']?></option>
    <?php    
}
mysqli_close($conn);
?>

</select>

<br>
<label>ราคาสินค้า :</label> 
<input type="number" name="price" class="form-control" value=<?=$rs['price']?> > <br>
<label>จำนวนสินค้าคงเหลือ :</label>
<input type="number" name="num" class="form-control" value=<?=$rs['amount']?> > <br>
<label>รูปภาพสินค้า :</label>
<img src="../image/<?=$rs['image']?>" width="120"> <br><br>
<input type="file" name="file1"   required > <br><br>
<input type="hidden" name="txtimg" class="form-control" value=<?=$rs['image']?> > <br>

<button type="submit" class="btn btn-success">Update</button>
<a class="btn btn-danger" href="show_product.php" role="button">Cancel</a>
<br><br>

</form>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php include 'footer.php';?>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>