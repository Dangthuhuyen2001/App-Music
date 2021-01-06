<!DOCTYPE html>
<html lang="en">
<?php
include'connect.php';

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"> <img src="img/logo.png" class="rounded-circle" alt="hinh tron" width="50px"
        height="50px" alt="#">
      <h3 class="text-gradient"> HuyềnAhihi</h3>

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
      aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="product.php#">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Admin.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="introduction.php">Introduction</a>
        </li>


        <?php
  if(isset($_COOKIE["user_name"]))
  {
     echo $_COOKIE['user_name'];?>
        <!-- Đăng nhập -->
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal" href="thoat.php">Thoát</a>
          <?php setcookie( "user_name", "", time()- 60); ?>
        </li>
        <?php }
  else
  {?>
        <!-- Đăng nhập -->
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal" href="#">Sign In</a>
        </li>
        <?php }
?>
        <!-- Modal đăng nhập-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="container_login">
                <div class="main">
                  <form method="post">
                    <div class="textbox">
                      <input type="text" name="Username" placeholder="Username" id="email" />
                    </div>
                    <div class="textbox">
                      <input type="Password" name="Password" placeholder="Password" id="password" />
                    </div>
                    <h6>Forgotten your password?</h6>

                    <button class="btn-login" type="submit" name="login" value="Login"> Login</button>
                </div>
                </form>
                <button class="btn-guest">Continue as a guest</button> <br>
                <button class="btn-back">Back</button>
              </div>

            </div>
          </div>

        </div>
        <?php 
    if (isset($_POST['login']))
    {
       $Username = $_POST['Username'];
       $Password = $_POST['Password'];


       $result = show_user();
       $admin = show_admin();
//    print_r($result);
       while ($row = $result->fetch()) {
        if($Username == $row['name_user'] && $Password == $row['pass_user']){
            header('Location: product.php');
            setcookie("user_name", $row['name_user'] , time() + 3600);
           break;
        }

        }
        while ($row = $admin->fetch()) {
        if($Username == $row['admin_name'] && $Password == $row['admin_pass']){
 
            header('Location: Admin.php');

           setcookie("admin_name", $row['admin_name'] , time() + 3600);
           break;
        }

    }
}
?>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal1" href="#">Register</a>
        </li>
        <!-- Modal đăng ký-->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="container_login">
                <div class="main">
                  <form method="post">
                    <div class="textbox">
                      <input type="text" name="username" required placeholder="UserName" id="email" />
                    </div>
                    <div class="textbox">
                      <input type="password" name="password" required placeholder="Password" id="password_confirm1" />
                    </div>
                    <h6>Forgotten your password?</h6>
                    <input class="btn-login" type="submit" name="register" value="Register" />
                </div>
                </form>
                <button class="btn-guest">Continue as a guest</button> <br>
                <button class="btn-back">Back</button>
              </div>
              <?php
                if (isset($_POST['register'])) {
                if (isset($_POST['username']) && isset($_POST['password'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                add_user($username, $password);
              }
            }
          ?>
            </div>
          </div>

        </div>

        <form class="form-inline my-2 my-lg-0"   >
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" 
          name='search[keyword]' value="<?php echo $search_keyword; ?>" id='keyword' maxlength='25'>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>

    </div>

  </nav>
  </div>
  <div class="grid bodyy">
    <div class="row">
      <div class="Slideshow col-xl-12 col-md-12 col-sm-12 ">
        <img class="mySlides" src="img/slide1.png">
        <img class="mySlides" src="img/slide2.png">
        <img class="mySlides" src="img/slide3.png">
        <img class="mySlides" src="img/slide4.png">
      </div>
    </div>
    <script>
      var myIndex = 0;
      carousel();
      function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) { myIndex = 1 }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 2000);
      }
    </script>
  </div>
  <div class="row grid=demo">
    <div class="col-md-4 col-xl-4">
      <div class="flip-card ">
        <div class="flip-card-inner">
          <div class="front">
            <img src="img/anh1.png" alt="" />
          </div>
          <div class="back">
            <img src="img/anh2.png" alt="" />
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-xl-4">
      <div class="flip-card ">
        <div class="flip-card-inner">
          <div class="front">
            <img src="img/anh3.png" alt="" />
          </div>
          <div class="back">
            <img src="img/anh4.png" alt="" />
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-xl-4">
      <div class="flip-card ">
        <div class="flip-card-inner">
          <div class="front">
            <img src="img/anh5.png" alt="" />
          </div>
          <div class="back">
            <img src="img/anh6.png" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="line-text"><span>ZingMP3</span></div>
  <footer>
    <div class="row grid=demo">
      <div class="col-md-4 col-xl-4">
        <aside>
          <h5 class="card-title">Thanh Toán</h5>
          <img src="img/thanhtoan.png" class="card-img-top" alt="...">
        </aside>
      </div>

      <div class="col-md-4 col-xl-4">
        <aside>
          <h5 class="card-title">Dịch Vụ Giao Hàng</h5>
          <img src="img/dichvugiaohang.png" class="card-img-top" alt="...">
        </aside>
      </div>
      <div class="col-md-4 col-xl-4">
        <aside>
          <h5 class="card-title">Cách Thanh Toán</h5>
          <img src="img/cachthanhtoan.png" class="card-img-top" alt="...">
        </aside>
      </div>

    </div>
  </footer>
</body>

</html>