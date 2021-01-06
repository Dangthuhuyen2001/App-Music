<?php
include 'connect.php';
try {
	$id = $_GET['id_cate'];
	$stmt = $connect->exec("DELETE FROM category WHERE id_cate = '$id'");
	echo("xóa thành công");
	$newURL = "view_category.php";
	header('Location: '.$newURL);


	$id_brand = $_GET['id_brand'];
	$stmt = $connect->exec("DELETE FROM brand WHERE id_brand = '$id_brand'");
	echo("xóa thành công");
	$newURL = "view_brand.php";
	header('Location: '.$newURL);


    $id_pro = $_GET['product_id'];
	$stmt = $connect->exec("DELETE FROM products WHERE product_id= '$id_pro'");
	echo("xóa thành công");
	$newURL = "view_product.php";
	header('Location: '.$newURL);
}catch (PDOException $e){
	echo $e->getMessage();
}


?>