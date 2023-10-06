<?php
session_start();
if(!isset($_SESSION["userid"]))
  header("location:login.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fastmotorpaint Shop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
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

    <!-- top navbar -->
    <div class="top-navbar">
      <p>ยินดีต้อนรับสู่ FASTMOTORPAINT SHOPS             
<?php
if(isset($_SESSION["name"])){
echo "<div class='text-danger'> ";
echo $_SESSION["name"] ." " . $_SESSION["lastname"] ;
echo "</div>";
}
?>
</p>
        <div class="icons">
            <a href="login.php"><img src="" alt="" width="18px">เข้าสู่ระบบ</a>
            <a href="logout.php"><img src="" alt="" width="18px">ออกจากระบบ</a>
        </div>
    </div>
    <!-- top navbar -->

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html" id="logo"><span id="span1">FAST</span>motorpaint <span>Shop</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><img src="./images/menu.png" alt="" width="30px"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.html">หน้าหลัก</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">สินค้า</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  หมวดหมู่
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgb(67 0 86);">
                  <li><a class="dropdown-item" href="#">1</a></li>
                  <li><a class="dropdown-item" href="#">1</a></li>
                  <li><a class="dropdown-item" href="#">1</a></li>
                  <li><a class="dropdown-item" href="#">1</a></li>
                  <li><a class="dropdown-item" href="#">1</a></li>
                  <li><a class="dropdown-item" href="#">1</a></li>
                  <li><a class="dropdown-item" href="#">1</a></li>
                  <li><a class="dropdown-item" href="#">1</a></li>
                  <li><a class="dropdown-item" href="#">1</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">เกี่ยวกับเรา</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">ติดต่อ</a>
              </li>
            </ul>
            <form class="d-flex" id="search">
              <input class="form-control me-2" type="search" placeholder="ค้นหา" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">ค้นหา</button>
            </form>
          </div>
        </div>
      </nav>
    <!-- navbar -->
    






    
    <!-- home content -->
    <section class="home">
    <div class="content">
      <h1> <span>FASTMOTORPAINT สินค้า</span>
        <br>
        ลด <span id="span2">50%</span> 
      </h1>
      <p style="font-size: 20px;">สำหรับลูกค้าใหม่เท่านั้น        
        <br>
      </p>
      <div class="btn"><button>ไปตอนนี้</button></div>

    </div>
    <div class="img">
      <img src="./image/" alt="">ใส่รูปโปรโมชั่น
    </div>
  </section>
    <!-- home content -->








    <!-- product cards -->
    <div class="container" id="product-cards">
      <h1 class="text-center">สินค้า</h1>
      <div class="row" style="margin-top: 30px;">
      <?php
      include 'condb.php';
      $sql = "SELECT * FROM product ORDER BY pro_id";
      $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_array($result)){
      ?>
      
        <div class="col-md-3 py-3 py-md-0">
          <div class="card">
            <img src="./image/<?=$row['image']?>">
            <div class="card-body">
              <p><h2>รหัสสินค้า:<?=$row['pro_id']?></h2></p>
              <h3 class="text-">ชื่อสินค้า:<?=$row['pro_name']?></h3>
              <p class="text-center"></p>
              
              <h2><b class="text-danger" ><?= number_format($row['price'])?></b> บาท <a href="product_detail.php?id=<?=$row['pro_id']?>"><span><li class="fa-solid fa-cart-shopping"></li></span></h2></a>
            </div>
          </div>
          </div>
          <?php
          }
          mysqli_close($conn);
          ?>
        
        
    <!-- product cards -->









    <!-- other cards -->
    <div class="container" id="other-cards">
      <div class="row">
        <div class="col-md-6 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-img-overlay">
              <h3>Best Laptop</h3>
              <h5>Latest Collection</h5>
              <p>Up To 50% Off</p>
              <button id="shopnow">Shop Now</button>
            </div>
          </div>
        </div>
        
    <!-- other cards -->






    <!-- banner -->
    <section class="banner">
      <div class="content">
        <h1> <span>Electronic Gadget</span>
          <br>
          Up To <span id="span2">50%</span> Off
        </h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta, saepe.
          <br>Lorem ipsum dolor sit amet consectetur.
        </p>
        <div class="btn"><button>Shop Now</button></div>
  
      </div>
      <div class="img">
        <img src="" alt="">
      </div>
    </section>
    <!-- banner -->








    <!-- product cards -->
    <div class="container" id="product-cards">

      <div class="row" style="margin-top: 30px;">
        <div class="col-md-3 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-body">
              <h3 class="text-center">Washion Machine</h3>
              <p class="text-center">Lorem ipsum dolor sit amet.</p>
              <div class="star text-center">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h2>$100.50 <span><li class="fa-solid fa-cart-shopping"></li></span></h2>
            </div>
          </div>
        </div>
        <div class="col-md-3 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-body">
              <h3 class="text-center">AC</h3>
              <p class="text-center">Lorem ipsum dolor sit amet.</p>
              <div class="star text-center">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h2>$500 <span><li class="fa-solid fa-cart-shopping"></li></span></h2>
            </div>
          </div>
        </div>
        <div class="col-md-3 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-body">
              <h3 class="text-center">Microwave Oven</h3>
              <p class="text-center">Lorem ipsum dolor sit amet.</p>
              <div class="star text-center">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h2>$200.30 <span><li class="fa-solid fa-cart-shopping"></li></span></h2>
            </div>
          </div>
        </div>
        <div class="col-md-3 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-body">
              <h3 class="text-center">Fridge</h3>
              <p class="text-center">Lorem ipsum dolor sit amet.</p>
              <div class="star text-center">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h2>$300 <span><li class="fa-solid fa-cart-shopping"></li></span></h2>
            </div>
          </div>
        </div>
      </div>

      <!-- other cards -->
    <div class="container" id="other">
      <div class="row">
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-img-overlay">
              <h3>Home Gadget</h3>
              <p>Latest collection Up To 50% Off</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-img-overlay">
              <h3>Gaming Gadget</h3>
              <p>Latest collection Up To 50% Off</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-img-overlay">
              <h3>Electronic Gadget</h3>
              <p>Latest collection Up To 50% Off</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- other cards -->




      <div class="row" style="margin-top: 30px;">
        <div class="col-md-3 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-body">
              <h3 class="text-center">Fan</h3>
              <p class="text-center">Lorem ipsum dolor sit amet.</p>
              <div class="star text-center">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h2>$50.60 <span><li class="fa-solid fa-cart-shopping"></li></span></h2>
            </div>
          </div>
        </div>
        <div class="col-md-3 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-body">
              <h3 class="text-center">Fridge</h3>
              <p class="text-center">Lorem ipsum dolor sit amet.</p>
              <div class="star text-center">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h2>$1500 <span><li class="fa-solid fa-cart-shopping"></li></span></h2>
            </div>
          </div>
        </div>
        <div class="col-md-3 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-body">
              <h3 class="text-center">Gaming PC</h3>
              <p class="text-center">Lorem ipsum dolor sit amet.</p>
              <div class="star text-center">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h2>500.60 <span><li class="fa-solid fa-cart-shopping"></li></span></h2>
            </div>
          </div>
        </div>
        <div class="col-md-3 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-body">
              <h3 class="text-center">Moniter</h3>
              <p class="text-center">Lorem ipsum dolor sit amet.</p>
              <div class="star text-center">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h2>$250 <span><li class="fa-solid fa-cart-shopping"></li></span></h2>
            </div>
          </div>
        </div>
      </div>



      <div class="row" style="margin-top: 30px;">
        <div class="col-md-3 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-body">
              <h3 class="text-center">Smart Watch</h3>
              <p class="text-center">Lorem ipsum dolor sit amet.</p>
              <div class="star text-center">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h2>$30.20 <span><li class="fa-solid fa-cart-shopping"></li></span></h2>
            </div>
          </div>
        </div>
        <div class="col-md-3 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-body">
              <h3 class="text-center">Power Bank</h3>
              <p class="text-center">Lorem ipsum dolor sit amet.</p>
              <div class="star text-center">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h2>$100.50 <span><li class="fa-solid fa-cart-shopping"></li></span></h2>
            </div>
          </div>
        </div>
        <div class="col-md-3 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-body">
              <h3 class="text-center">Gaming Mouse</h3>
              <p class="text-center">Lorem ipsum dolor sit amet.</p>
              <div class="star text-center">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h2>$30 <span><li class="fa-solid fa-cart-shopping"></li></span></h2>
            </div>
          </div>
        </div>
        <div class="col-md-3 py-3 py-md-0">
          <div class="card">
            <img src="" alt="">
            <div class="card-body">
              <h3 class="text-center">Joysticks</h3>
              <p class="text-center">Lorem ipsum dolor sit amet.</p>
              <div class="star text-center">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h2>$150 <span><li class="fa-solid fa-cart-shopping"></li></span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- product cards -->









    <!-- offer -->
    <div class="container" id="offer">
      <div class="row">
        <div class="col-md-3 py-3 py-md-0">
          <i class="fa-solid fa-cart-shopping"></i>
          <h3>ซื้อครั้งแรก</h3>
          <p>ลดหนักจัดเต็มสำหรับลูกค้าใหม่</p>
        </div>
        <div class="col-md-3 py-3 py-md-0">
          <i class="fa-solid fa-rotate-left"></i>
          <h3>คืนสินค้ากรณีชำรุด</h3>
          <p>ภายใน 15 เท่านั้น</p>
        </div>
        <div class="col-md-3 py-3 py-md-0">
          <i class="fa-solid fa-truck"></i>
          <h3>ส่งเร็ว</h3>
          <p>ทั่วประเทศ</p>
        </div>
        <div class="col-md-3 py-3 py-md-0">
          <i class="fa-solid fa-thumbs-up"></i>
          <h3>สินค้าคุณภาพ</h3>
          <p>ถูกใจ</p>
        </div>
      </div>
    </div>
    <!-- offer -->












    <!-- footer -->
    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
              <h3>1</h3>
              <p>
                1<br>
                1<br>
                1<br>
              </p>
              <strong>1</strong>  <br>
              <strong>1</strong>  <br>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>1</h4>
            <ul>
              <li><a href="#">1</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">1</a></li>
            </ul>
            </div>



          

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>1</h4>

            <ul>
              <li><a href="#">1</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">1</a></li>
            </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>1</h4>
              <p>1</p>

              <div class="socail-links mt-3">
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-skype"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
              </div>
            
            </div>

          </div>
        </div>
      </div>
      
      
    </footer>
    <!-- footer -->
    







    <a href="#" class="arrow"><i><img src="" alt=""></i></a>




    








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>