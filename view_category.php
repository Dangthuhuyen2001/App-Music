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

            <h2>View Categories</h2>
            <div class="border_bottom"></div>

            <form action="" method="post" enctype="multipart/form-data" />

           

            <table width="100%">
                    <tr>
                        
                        <th>ID</th>
                        <th>Category Title</th>
                        <th>Status</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>

                <?php 
                $result = show_Cate();
                //print_r($result);
                while ($row = $result->fetch()) {
                    ?>
                    <tr>
                        
                        <td><?= $row['id_cate']; ?></td>
                        <td><?= $row['name_cate']; ?></td>
                        <td> Approved </td>
                        <td><a href="delete.php?<?="id_cate=".$row['id_cate'];?>"> Delete</a></td>
                        <td><a href="edit_category.php?action=edit_cat&cat_id=1">Edit</a></td>
                    </tr>   
                                      
                    <?php
                }
                ?>

             

                 <tr>

              <td></td> 
              <td>
               

                  <a class="btn btn-outline-success" href="http://localhost/Linkhtml/Asm2_SDLC/add_category.php" role="button"   style="margin-top: 10px;">Thêm danh mục khác</a>
            </tr>
            </table>

        </form>

    </div><!-- /.view_product_box -->




</div><!-- /.content_box -->

</div><!-- /.content -->
<?php include "footer.php" ?>
</body>
</html>