<!DOCTYPE html>
<html lang="en">
<?php

 include 'header.php';

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

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
  <link rel="stylesheet" href="product.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


    </div>
  </nav>
  <div class="container">

    <div class="row row-cols-1 row-cols-md-3">

      <?php 
        $product_name = show_product();
        while ($cat = $product_name->fetch())
          {
           ?>
      <div class="col mb-4">
        <div class="card h-100">
          <div class="responsive-media">
            <!-- <iframe src="img/<?= $cat['product_image']?>" frameborder="0" style="width:100%;  height:190px;" 
                    allow=" accelerometer; encrypted-media; gyroscope; picture-in-picture "  allowfullscreen>      
                </iframe> -->

            <video controls style="width:100%;  height:190px" src="img/<?= $cat['product_image']?>"></video>
          </div>
          <div class="card-body">
            <a href="detail_product.php?<?="product_id=".$cat['product_id'];?>">

              <?=$cat['product_title'] ?></a>
            <p><?=$cat['product_price'] ?>$</p>
            <a href="cartt.php" class="btn btn-success btn-lg">Add to cart</a>
          </div>
        </div>
      </div>
      <?php 
          }
          ?>
     

      </div>

    </div>
  </div>
  <?php include "footer.php" ?>
  </div>
</body>

</html>