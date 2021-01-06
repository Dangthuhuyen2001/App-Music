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


      <div class="form_box">

        <form action="" method="post" enctype="multipart/form-data">

          <table align="center" width="100%">

            <tr>
              <td colspan="7">
                <h2>Add Category</h2>
                <div class="border_bottom"></div>
                <!--/.border_bottom -->
              </td>
            </tr>

            <tr>
              <td><b>Add New Cateogry:</b></td>
              <td><input type="text" name="product_cat" size="60" required /></td>
            </tr>


            <tr>

              <td></td>
              <td>
                <button type="submit" class="btn btn-outline-success"name="insert_cat" value="Add Category" 
                  style="margin-top: 10px;">Thêm </button>
            </tr>
          </table>

        </form>

      </div><!-- /.form_box -->


      <?php

                $name_cate = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    if(isset($_POST["product_cat"])) 
                    { 
                        $name_cate = $_POST['product_cat']; 
                        add_Cate($name_cate);
                    }
                }

                ?>








    </div><!-- /.content_box -->

  </div><!-- /.content -->
  <?php include "footer.php" ?>

</body>

</html>