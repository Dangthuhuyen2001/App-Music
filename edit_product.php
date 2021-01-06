<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="admin_tong.css">
</head>
<body>
 <?php include "header.php";
 include "header1.php";
      include_once "connect.php";

 ?> 


 <div class="content">
  <div class="content_box">



   <div class="form_box">
      <form action="" method="POST" enctype="multipart/form-data">
    <?php
    $result = show_product();
    while ($rows = $result->fetch()) {
      ?>
      <?php

      if($_GET['product_id'] == $rows['product_id']){
       ?>
        <table align="center" width="100%">

          <tr>
            <td colspan="7">
              <h2>Edit Product</h2>
              <div class="border_bottom"></div><!--/.border_bottom -->
            </td>
          </tr>
          <tr>
            <td><b>Product Title:</b></td>
            <td><input type="text" name="product_title1" value="<?=$rows['product_title'];?>" size="60" required/></td>
          </tr>

          <tr>
            <td><b>Product Category:</b></td>
            <td>
             <select name="product_cat1">
               <?php 
               $result1 = show_Cate();
               while ($row1 = $result1->fetch()) {
                ?>
                <option value='<?= $row1['id_cate']; ?>'> <?= $row1['name_cate'];?></option>
              <?php }?>

            </tr>

            <tr>
              <td><b>Product Brand:</b></td>
              <td>
               <select name="product_brand1">
                 <?php 
                 $result2 = show_brand();
                 while ($row2 = $result2->fetch()) {?>

                  <option value='<?= $row2['id_brand']; ?>'><?= $row2['name_brand'];?></option>
                <?php }?>
              </td>

            </tr>

            <tr>
             <td valign="top"><b>Product Image: </b></td>
             <td>
               <input type="file" name="product_image1" />
              </div> 
            </td>
          </tr>

          <tr>
           <td><b>Product Price: </b></td>
           <td><input type="text" name="product_price1" value="<?=$rows['product_price'];?>" required/></td>
         </tr>

         <tr>
          <td valign="top"><b>Product Description:</b></td>
          <td><textarea name="product_desc1"  rows="10"><?=$rows['product_desc']?></textarea></td>
        </tr>


        <tr>
         <td><b>Product Keywords: </b></td>
         <td><input type="text" name="product_keywords1" value="<?=$rows['product_keywords'];?>" required/></td>
       </tr>

       <tr>
        <td></td>
        <td> <button type="submit" class="btn btn-outline-success" name="edit_product" value="Save"
                  style="margin-top: 10px;">Save</button> 
                </td>

      </tr>
    </table>

  
<?php } ?>

<?php
}?>
</form>
<?php
    if(isset($_POST['edit_product'])){

     $product_title1 = $_POST['product_title1'];
     $product_cat1 = $_POST['product_cat1'];
     $product_brand1 = $_POST['product_brand1'];
     $product_price1 = $_POST['product_price1'];

     $product_desc1= trim($_POST['product_desc1']);
     $product_keywords1 = $_POST['product_keywords1']; 

     $array = array('jpg', 'jpeg', 'png', 'gif');
     $file_name = $_FILES['product_image1']['name'];
     $file_size = $_FILES['product_image1']['size'];
     $tmp = $_FILES['product_image1']['tmp_name'];

     $div = explode('.', $file_name);
     $file_text = strtolower(end($div));
     $image = substr(md5(time()), 0, 10).'.'.$file_text;
     $up_load = "img/".$image;
     move_uploaded_file($tmp, $up_load);

     $insert_pro = update_products($product_cat1, $product_brand1, $product_title1, $product_price1, $product_desc1, $image, $product_keywords1, $_GET['product_id'] );
    if($insert_pro)
    {
    echo "<script>alert('Product Has Been updateed successfully!')</script>";
     header('Location: index.php');
    }
}
 ?>

</div><!-- /.form_box -->



</div><!-- /.content_box -->

</div><!-- /.content -->
<?php include "footer.php"; ?>
</body>
</html>