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
  <div class="content" >
    <div class="content_box">


        <div class="form_box">

            <form action="" method="POST" enctype="multipart/form-data">

                <table align="center" width="100%">

                    <tr>
                        <td colspan="7">
                            <h2>Add Brand</h2>
                            <div class="border_bottom"></div>
                            <!--/.border_bottom -->
                        </td>
                    </tr>

                    <tr>
                        <td><b>Add New Brand:</b></td>
                        <td><input type="text" name="product_brand" size="60" required /></td>
                    </tr>

              <td></td> 
              <td>
                <button type="submit" class="btn btn-outline-success" name="insert_brand"
                            value="Add Brand"
                  style="margin-top: 10px;">Thêm </button>
            </tr>
                    </table>

                </form>

            </div><!-- /.form_box -->

            <?php

            $name_brand = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                if(isset($_POST["product_brand"])) 
                { 
                    $name_brand= $_POST['product_brand']; 
                   add_brand($name_brand);
                }


               
            }

            ?>








        </div><!-- /.content_box -->

    </div><!-- /.content -->
    <?php include "footer.php" ?>
</body>
</html>