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
    <div class="content_box">


      <div class="view_product_box">

        <h2>View Products</h2>
        <div class="border_bottom"></div>

        <form action="" method="post" enctype="multipart/form-data" />

        <div class="search_bar">
          <input type="text" id="search" placeholder="Type to search..." />
        </div>

        <table width="100%">
         <thead>
          <tr>
           
           <th>ID</th>
           <th>Title</th>
           <th>Price</th>
           <th style="padding-left: 100px;">Video</th>
         
           <th>Delete</th>
           <th>Edit</th>
         </tr>
       </thead>


       <?php 

       $result = show_product();
        //$cat_name = show_Cate();
       // $brand_name = show_brand();
        //print_r($brand_name);
       while ($row = $result->fetch()) {
        ?>

        <tbody>

          <tr>
           
           <td><?= $row['product_id']; ?></td>
           <td><?= $row['product_title']; ?></td>
           <td><?= $row['product_price']; ?></td>

           <td>
             <div class="responsive-media">
                <video controls style="width:300px;  height:190px" src="img/<?= $row['product_image']?>"></video>
              </div>
              <!--     <video controls style="width:70%;  height:190px" src="img/<?= $cat['product_image']?>"></video> -->
              </td>
       

                <td><a href="delete.php?<?="product_id=".$row['product_id'];?>">Delete</a></td>
                
                <td><a href="edit_product.php?<?="product_id=".$row['product_id'];?>">Edit </a></td>
              </tr>
            </tbody>

          <?php } ?>

             <tr>

              <td></td> 
              <td>
               

                  <a class="btn btn-outline-success" href="http://localhost/Linkhtml/Asm2_SDLC/add_product.php" role="button"   style="margin-top: 10px;">Thêm sản phẩm khác</a>
            </tr>
        </table>

      </form>

    </div><!-- /.view_product_box -->




  </div><!-- /.content_box -->

</div><!-- /.content -->
<?php include "footer.php" ?>
</body>
</html>

  <!--   <?php
           while ($cat = $cat_name->fetch()){
             if($row['product_cat'] == $cat['id_cate'] )
             {
              ?>
              <td><?=$cat['name_cate'];?></td>
              <?php 
            }}
            ?>
            <?php
            while ($brand = $brand_name->fetch()){
              if($row['product_brand'] == $brand['id_brand'] )
                {?>
                  <td><?=$brand['name_brand'];?></td>
                  <?php 
                }}
                ?> -->
                <td><?= $row['product_keywords']; ?> </td>
                <td><?= $row['product_desc']; ?> </td><!-- / status -->