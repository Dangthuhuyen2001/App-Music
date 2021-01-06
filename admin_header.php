<!DOCTYPE html>
<html lang="en">
<?php
include'connect.php';
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"> <img src="img/logo.png" class="rounded-circle" alt="hinh tron" width="50px"
        height="50px" alt="#">
      <h3 class="text-gradient"> Admin</h3>

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
      aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="http://localhost/Linkhtml/Asm2_SDLC/add_product.php"> Thêm sản phẩm <span
              class="glyphicon glyphicon-home sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/Linkhtml/Asm2_SDLC/view_product.php"> Xem sản phẩm<span
              class="glyphicon glyphicon-user"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/Linkhtml/Asm2_SDLC/add_category.php"> Thêm danh mục<span
              class="glyphicon glyphicon-user"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/Linkhtml/Asm2_SDLC/view_category.php"> Xem danh mục<span
              class="glyphicon glyphicon-user"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/Linkhtml/Asm2_SDLC/add_brand.php"> Thêm nhãn hiệu<span
              class="glyphicon glyphicon-user"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/Linkhtml/Asm2_SDLC/view_brand.php"> Xem nhãn hiệu<span
              class="glyphicon glyphicon-user"></span></a>
        </li>
<li class="nav-item">
          <a class="nav-link" href="http://localhost/Linkhtml/Asm2_SDLC/index.php"> Thoát<span
              class="glyphicon glyphicon-user"></span></a>
        </li>

    </div>


    

  </nav>
</body>

</html>