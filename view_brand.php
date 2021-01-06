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

            <h2>View Brands</h2>
            <div class="border_bottom"></div>

            <form action="" method="post" enctype="multipart/form-data" />

           

            <table width="100%">
                <thead>
                    <tr>
                       
                        <th>ID</th>
                        <th>Brand Title</th>
                        <th>Status</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                        <?php 
                        $result = show_brand();
               
                        while ($row = $result->fetch()) {
                            ?>
                            <tr>
                                
                                <td><?=$row['id_brand'] ?></td>
                                <td><?=$row['name_brand'] ?></td>
                                <td>Approved </td><!-- / status -->
                                <td><a href="delete.php?<?="id_brand=".$row['id_brand'];?>">Delete</a></td>
                                <td><a href="index.php?action=edit_brand&brand_id=7">Edit</a></td>
                            <?php } ?>
                            </tbody>

               <tr>

              <td></td> 
              <td>
               

                  <a class="btn btn-outline-success" href="http://localhost/Linkhtml/Asm2_SDLC/add_brand.php " role="button"   style="margin-top: 10px;">Thêm nhãn hiệu khác</a>
            </tr>
                        </table>

                    </form>

                </div><!-- /.view_product_box -->




            </div><!-- /.content_box -->

        </div><!-- /.content -->
        <?php include "footer.php" ?>
    </body>
    </html>