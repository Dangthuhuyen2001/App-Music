<!DOCTYPE html>
<html lang="en">
<?php include "header.php";
 
 ?>

<head>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossOrigin="anonymous" />
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
  <link rel="stylesheet" href="detail_product.css">

</head>

<body>

  <?php 
        $product_name = show_product();
        while ($cat = $product_name->fetch())
          {
           ?>
  <?php

      if($_GET['product_id'] == $cat['product_id']){
       ?>
  <!--  <a href="detail_product.php?<?="product_id=".$cat['product_id'];?>" > -->
  <div class="col-sm-12 col-md-12 col-lg-12">
    <!-- product -->

    <div class="product-content product-wrap clearfix product-deatil">
      <div class="row">

        <div class="col-md-5 col-sm-12 col-xs-12">


          <video controls style="width:100%;  height:100%" src="img/<?= $cat['product_image']?>"></video>

        </div>

        <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
          <h2 class="name">
            <?=$cat['product_title'];?>

            <i class="fa fa-star fa-2x text-primary"></i>
            <i class="fa fa-star fa-2x text-primary"></i>
            <i class="fa fa-star fa-2x text-primary"></i>
            <i class="fa fa-star fa-2x text-primary"></i>
            <i class="fa fa-star fa-2x text-muted"></i>
            <span class="fa fa-2x">
              <h5>(109) Votes</h5>
            </span>
            <a href="javascript:void(0);">109 customer reviews</a>
          </h2>
          <hr />
          <h3 class="price-container" value="">
            <!-- $129.54  --> <?= $cat['product_price']?>$

          </h3>
          <div class="certified">
            <ul>
              <li>
                <a href="javascript:void(0);">Delivery time<span>7 Working Days</span></a>
              </li>
              <li>
                <a href="javascript:void(0);">Certified<span>Quality Assured</span></a>
              </li>
            </ul>
          </div>
          <hr />
          <div class="description description-tabs">
            <ul id="myTab" class="nav nav-pills">
              <li class="active"><a href="#more-information" data-toggle="tab" class="no-margin">Product Description
                </a></li>
              <li class=""><a href="#specifications" data-toggle="tab"
                  style="padding: 0px 30px 0px 30px;">Specifications</a></li>
              <li class=""><a href="#reviews" data-toggle="tab">Review</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="more-information">
                <br />
                <dt>Test lists</dt>
                <strong> <?= $cat['product_desc']?></strong>

              </div>
              <div class="tab-pane fade" id="specifications">
                <br />
                <dl class="">

                  <dt>Test lists</dt>
                  <dd><?=$cat['product_keywords'];?></dd>
                  <br />

                </dl>
              </div>
              <div class="tab-pane fade" id="reviews">
                <br />
                <form method="post" class="well padding-bottom-10" onsubmit="return false;">
                  <textarea rows="2" class="form-control" placeholder="Write a review"></textarea>
                  <div class="margin-top-10">
                    <button type="submit" class="btn btn-sm btn-primary pull-right">
                      Submit Review
                    </button>

                  </div>
                </form>

                <div class="chat-body no-padding profile-message">
                  <ul>
                    <li class="message">
                      <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="online" />
                      <span class="message-text">
                        <a href="javascript:void(0);" class="username">
                          Alisha Molly
                          <span class="badge">Purchase Verified</span>
                          <span class="pull-right">
                            <i class="fa fa-star fa-2x text-primary"></i>
                            <i class="fa fa-star fa-2x text-primary"></i>
                            <i class="fa fa-star fa-2x text-primary"></i>
                            <i class="fa fa-star fa-2x text-primary"></i>
                            <i class="fa fa-star fa-2x text-muted"></i>
                          </span>
                        </a>
                        Can't divide were divide fish forth fish to. Was can't form the, living life grass darkness very
                        image let unto fowl isn't in blessed fill life yielding above all moved
                      </span>
                      <ul class="list-inline font-xs">
                        <li>
                          <a href="javascript:void(0);" class="text-info"><i class="fa fa-thumbs-up"></i> This was
                            helpful (22)</a>
                        </li>
                        <li class="pull-right">
                          <small class="text-muted pull-right ultra-light"> Posted 1 year ago </small>
                        </li>
                      </ul>
                    </li>

                  </ul>
                </div>
              </div>
            </div>
          </div>
          <hr />
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
              <a href="cartt.php" class="btn btn-success btn-lg"> <i class="fal fa-long-arrow-right"></i>Add to cart (
                <?=$cat['product_price'];?>$)</a>
            </div>
           

            <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="btn-group pull-right">
                <button class="btn btn-white btn-default"><i class="fa fa-star"></i> Add to wishlist</button>
                <button class="btn btn-white btn-default"><i class="fa fa-envelope"></i> Contact Seller</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <?php } ?>
  <?php } ?>
  <?php include "footer.php" ?>
</body>

</html>