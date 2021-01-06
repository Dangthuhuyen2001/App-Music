<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="admin_tong.css">
</head>
<body>
	<?php include "admin_header.php" ?>
  <div class="content">
    <div class="content_box" style="margin-top: 50px;">


        <div class="form_box">

            <form action="" method="post" enctype="multipart/form-data">

                <table align="center" width="100%">

                    <tr>
                        <td colspan="7">
                            <h2>Add Product</h2>
                            <div class="border_bottom"></div>
                            <!--/.border_bottom -->
                        </td>
                    </tr>

                    <tr>
                        <td><b>Product Title:</b></td>
                        <td><input type="text" name="product_title" size="60" required /></td>
                    </tr>

                    <tr>
                        <td><b>Product Category:</b></td>
                        <td>


                            <select name="product_cat">
                             <option>Select a Category</option>
                             <?php 
                             $result = show_cate();

                             while ($row = $result->fetch()) {
                                ?>

                                <option value='<?= $row['id_cate']; ?>'><?= $row['name_cate'];?></option>
                            <?php }?>
                        </select>

                    </td>

                </tr>

                <tr>
                    <td><b>Product Brand:</b></td>
                    <td>
                        <select name="product_brand">
                           <option>Select a Brand</option>
                           <?php 
                           $result = show_brand();
                           while ($row = $result->fetch()) {?>

                            <option value='<?= $row['id_brand']; ?>'><?= $row['name_brand'];?></option>
                        <?php }?>
                    </select>
                </td>

            </tr>

            <tr>
                <td><b>Product Image: </b></td>
                <td><input type="file" name="product_image" /></td>
            </tr>

            <tr>
                <td><b>Product Price: </b></td>
                <td><input type="text" name="product_price" required /></td>
            </tr>

            <tr>
                <td valign="top"><b>Product Description:</b></td>
                <td><textarea name="product_desc" rows="10"></textarea></td>
            </tr>


            <tr>
                <td><b>Product Keywords: </b></td>
                <td><input type="text" name="product_keywords" required /></td>
            </tr>

            <tr >
                <!-- <td></td>
                <td colspan="7"><input type="submit" name="insert_post"
                    value="Add Product" /></td> -->
                     <td ></td>
                <td >
                  <button type="submit" class="btn btn-outline-success" name="insert_post"  value="Add Product" style="margin-top: 10px;">Thêm sản phẩm</button>
                 </tr>
                 </td>
            </table>

        </form>

    </div><!-- /.form_box -->

    <?php 

    if(isset($_POST['insert_post'])){
     $product_title = $_POST['product_title'];
     $product_cat = $_POST['product_cat'];
     $product_brand = $_POST['product_brand'];
     $product_price = $_POST['product_price'];
     $product_desc = trim($_POST['product_desc']);
     $product_keywords = $_POST['product_keywords']; 

     $array = array('jpg', 'jpeg', 'png', 'gif');
     $file_name = $_FILES['product_image']['name'];
     $file_size = $_FILES['product_image']['size'];
     $tmp = $_FILES['product_image']['tmp_name'];

     $div = explode('.', $file_name);
     $file_text = strtolower(end($div));
     $image = substr(md5(time()), 0, 10).'.'.$file_text;
     $up_load = "img/".$image;
     move_uploaded_file($tmp, $up_load);

     $insert_pro = add_products($product_cat, $product_brand, $product_title, $product_price, $product_desc, $image, $product_keywords);

     if($insert_pro){
        echo "<script>alert('Product Has Been inserted successfully!')</script>";
     header('Location: index.php');
      }
}
?>


</div>
</div> 
<?php include "footer.php" ?>
</body>

</html>