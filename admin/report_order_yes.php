<?php
session_start();
if(!isset($_SESSION["userid"]))
header("location:login.php");

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

            <?php include 'navbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">ข้อมูลการสั่งซื้อ</h1>
                    <p class="mb-4"><a target="_blank"
                            href="https://datatables.net"></a></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">แสดงข้อมูลการสั่งซื้อสินค้าชำระแล้ว</h6><br>
                            <div>
                                <a href="report_order_yes.php"><button type="button" class="btn btn-outline-success">ชำระแล้ว</button></a>
                                <a href="report_order.php"><button type="button" class="btn btn-outline-dark">ยังไม่ชำระ</button></a>
                                <a href="report_order_no.php"><button type="button" class="btn btn-outline-danger">ยกเลิกคำสั่งซื้อ</button></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>เลขที่ใบสั่งซื้อ</th>
                                            <th>ชื่อ</th>
                                            <th>ที่อยู่การจัดส่ง</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <th>ราคารวม</th>
                                            <th>วันที่สั่งซื้อ</th>
                                            <th>สถานะ</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>เลขที่ใบสั่งซื้อ</th>
                                            <th>ชื่อ</th>
                                            <th>ที่อยู่การจัดส่ง</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <th>ราคารวม</th>
                                            <th>วันที่สั่งซื้อ</th>
                                            <th>สถานะ</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php
$sql = "select * from tb_order where order_status='2' order by reg_date DESC";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
$status = $row['order_status'];

?>
                                    
                                        <tr>
                                            <td><?=$row['orderID']?></td>
                                            <td><?=$row['cus_name']?></td>
                                            <td><?=$row['address']?></td>
                                            <td><?=$row['telephone']?></td>
                                            <td><?=$row['total_price']?></td>
                                            <td><?=$row['reg_date']?></td>
                                            <td>
                                            <?php
                                            if($status == 1){
                                            echo "ยังไม่ชำระเงิน";
                                            }else if($status == 2){
                                            echo "ชำระเงินเสร็จสิ้น";
                                            }else if($status == 0){
                                                echo "ยกเลิกคำสั่งซื้อ";
                                            }
                                            ?>
                                            </td>
                                            
                                        </tr>
                                    
<?php
}
mysqli_close($conn)
?>
</tbody>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

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
