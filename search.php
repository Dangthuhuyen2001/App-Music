<?php include("connect_db.php");
if (isset( $_GET['search']) && $_GET["keyword"] != '') {

    $keyword = $_GET['keyword'];
	$query = "SELECT * FROM product WHERE keyword like '%$keyword%' ";
    $sql = mysqli_query($conn, $query);
    $num = mysqli_num_rows($sql);

    if ($num > 0) {
        foreach( $sql as $row ){
                $pro_id= $row['id'];
                $get_pro = "select * from product where id = $pro_id";
				$run_pro = mysqli_query($conn, $get_pro);
				while($row_pro = mysqli_fetch_array($run_pro)){
				  $pro_id = $row_pro['id'];
				  $pro_cat = $row_pro['category_id'];
				  $pro_singer = $row_pro['singer_id'];
				  $pro_title = $row_pro['name'];
				  $pro_price_old = $row_pro['price_old'];
				  $pro_price_current = $row_pro['price_current'];
				  $pro_discount = $row_pro['discount'];	  
				  $pro_file = $row_pro['file'];
				  $pro_image = $row_pro['image'];
				  $pro_des = $row_pro['des'];
				  $pro_keyword = $row_pro['keyword'];
				  $get_cate_name = mysqli_query($conn, "SELECT * FROM category where id = $pro_cat");
				  	if ($get_cate_name) {
				  		 while($row=mysqli_fetch_row($get_cate_name)){
				  			$cate_name = $row[	1];
				  		}	
				  		mysqli_free_result($get_cate_name);
				  	}

				  $get_singer_info = mysqli_query($conn, "SELECT * FROM singer where id = $pro_singer");
					if ($get_singer_info) {
					    while($row=mysqli_fetch_row($get_singer_info)){
					         $singer_name = $row[2];
					         $origin_id = $row[1];
					         $get_origin_name = mysqli_query($conn, "SELECT * FROM origin where id = $origin_id");
					         if ($get_origin_name){
					    		while($row=mysqli_fetch_row($get_origin_name)) {
					         		$origin_name = $row[1];
					    		}
					    		mysqli_free_result($get_origin_name);
							}
						}
						mysqli_free_result($get_singer_info);
					}
				  echo "
				      <div class='col l-2-4 m-4 c-12'>
						<a class='home-product-item' href='detail.php?id=$pro_id'>
							<div class='home-product-item__img' style='background-image: url(admin/image_product/$pro_image);'></div>
							<h4 class='home-product-item__name'>$pro_title</h4>
							<div class='home-product-item__price'>
								<span class='home-product-item__name-old'>$ $pro_price_old</span>
								<span class='home-product-item__name-current'>$ $pro_price_current</span>
							</div>

							<div class='home-product-item__action'>
								<span class='home-product-item__like home-product-item__like--liked'>
									<i class='far fa-heart home-product-item__like-icon-empty'></i>
									<i class='fas fa-heart home-product-item__like-icon-fill'></i>
								</span>
								<div class='home-product-item__rating'>
										<i class='home-product-item__star--gold fas fa-star'></i>
										<i class='home-product-item__star--gold fas fa-star'></i>
										<i class='home-product-item__star--gold fas fa-star'></i>
										<i class='home-product-item__star--gold fas fa-star'></i>
										<i class='fas fa-star'></i>
								</div>
								<span class='home-product-item__sold'>88 đã bán</span>
							</div>
						
							<div class='home-product-item__origin'>
								<span class='home-product-item__brand'>$singer_name</span>
								<span class='home-product-item__origin-name'>$origin_name</span>
							</div>

							<div class='home-product-item__favourite'>
								<i class='fas fa-check'></i>
								<span>Yêu thích</span>
							</div>

							<div class='home-product-item__sale-off'>
								<span class='home-product-item__sale-off-percent'>$pro_discount%</span>
								<span class='home-product-item__sale-off-label'>Giảm</span>
							</div>
						</a>
					</div>
				  ";
				}
	        }
    	} 
    else {
        echo "<script>alert('No product has keyword is: $keyword')</script>";
      	echo "<script>window.open('index.php','_self')</script>";
      	exit();
    }
}
?>