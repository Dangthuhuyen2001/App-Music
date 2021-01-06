<!DOCTYPE html>
<html lang="en">
<?php
 include_once'connect.php';

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="cart.css">
  <link rel="stylesheet" href="cart1.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossOrigin="anonymous" />
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

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>

  <script type="text/javascript">
    $(document).ready(function () {

      /* Set rates + misc */
      var taxRate = 0.05;
      var shippingRate = 15.00;
      var fadeTime = 300;


      /* Assign actions */
      $('.product-quantity input').change(function () {
        updateQuantity(this);
      });

      $('.product-removal button').click(function () {
        removeItem(this);
      });


      /* Recalculate cart */
      function recalculateCart() {
        var subtotal = 0;

        /* Sum up row totals */
        $('.product').each(function () {
          subtotal += parseFloat($(this).children('.product-line-price').text());
        });

        /* Calculate totals */
        var tax = subtotal * taxRate;
        var shipping = (subtotal > 0 ? shippingRate : 0);
        var total = subtotal + tax + shipping;

        /* Update totals display */
        $('.totals-value').fadeOut(fadeTime, function () {
          $('#cart-subtotal').html(subtotal.toFixed(2));
          $('#cart-tax').html(tax.toFixed(2));
          $('#cart-shipping').html(shipping.toFixed(2));
          $('#cart-total').html(total.toFixed(2));
          if (total == 0) {
            $('.checkout').fadeOut(fadeTime);
          } else {
            $('.checkout').fadeIn(fadeTime);
          }
          $('.totals-value').fadeIn(fadeTime);
        });
      }
      /* Update quantity */
      function updateQuantity(quantityInput) {
        /* Calculate line price */
        var productRow = $(quantityInput).parent().parent();
        var price = parseFloat(productRow.children('.product-price').text());
        var quantity = $(quantityInput).val();
        var linePrice = price * quantity;

        /* Update line price display and recalc cart totals */
        productRow.children('.product-line-price').each(function () {
          $(this).fadeOut(fadeTime, function () {
            $(this).text(linePrice.toFixed(2));
            recalculateCart();
            $(this).fadeIn(fadeTime);
          });
        });
      }


      /* Remove item from cart */
      function removeItem(removeButton) {
        /* Remove row from DOM and recalc cart total */
        var productRow = $(removeButton).parent().parent();
        productRow.slideUp(fadeTime, function () {
          productRow.remove();
          recalculateCart();
        });
      }

    });

  </script>
  <h1>Shopping Cart</h1>

  <div class="shopping-cart">

    <div class="column-labels">
      <label class="product-image">Image</label>
      <label class="product-details">Product</label>
      <label class="product-price">Price</label>
      <label class="product-quantity">Quantity</label>
      <label class="product-removal">Remove</label>
      <label class="product-line-price">Total</label>
    </div>
    <?php 

       $result = show_product();
        //$cat_name = show_Cate();
       // $brand_name = show_brand();
        //print_r($brand_name);
       while ($row = $result->fetch()) {
        ?>

    <div class="product">
      <div class="product-image">
        <video controls style="width:300px;  height:190px" src="img/<?= $row['product_image']?>"></video>
      </div>
      <div class="product-details">
        <div class="product-title"> <?=$row['product_title'];?> </div>
        <p class="product-description"> <?= $row['product_desc']?></p>
      </div>
      <div class="product-price"><?= $row['product_price']?></div>
      <div class="product-quantity">
        <input type="number" value="2" min="1">
      </div>
      <div class="product-removal">
        <button class="remove-product">
          Remove
        </button>
      </div>
      <div class="product-line-price"><?= $row['product_price']?></div>
    </div>

    <?php } ?>
    <div class="totals">
      <div class="totals-item">
        <label>Subtotal</label>
        <div class="totals-value" id="cart-subtotal">71.97</div>
      </div>
      <div class="totals-item">
        <label>Tax (5%)</label>
        <div class="totals-value" id="cart-tax">3.60</div>
      </div>
      <div class="totals-item">
        <label>Shipping</label>
        <div class="totals-value" id="cart-shipping">15.00</div>
      </div>
      <div class="totals-item totals-item-total">
        <label>Grand Total</label>
        <div class="totals-value" id="cart-total">90.57</div>
      </div>

      <button class="checkout" data-toggle="modal" data-target="#exampleModal1 " > Checkout </button>
     
       <a href="product.php" class="btn btn-success btn-lg">Back to cart</a>
       <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Thanh Toán</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                   </button>
              </div>
                   <div class="noti noti--success">

                        <p class="desc"> Bạn đã thanh toán thành công</p>
                       <div class="button1">
                     <a href="javascript:void(0);" class="btn btn-success btn-lg" > <i class="fal fa-long-arrow-right"></i> Chúc mừng</a>
                    </div>
                        
                  
                  </div>
            </div>
         </div>

        </div>

      <!--  <div class="modal fade" id="exampleModal_noti" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel_noti"> <i class="fal fa-bell icon"></i>
                      Bạn chưa có tài khoản
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="noti noti--success">

                    <p class="desc"> Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng</p>
                    <div class="button1">
                      <a href="javascript:void(0);" class="btn btn-success btn-lg" data-toggle="modal"
                        data-target="#exampleModal_login"> <i class="fal fa-long-arrow-right"></i> Thanh Toán</a>
                    </div>
                  
                  </div>

                </div>
              </div>
         </div> -->

    </div>
 


</div>
</body>

</html>