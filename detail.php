<?php 

$hostName = 'localhost';
$userName = 'root';
$passWord = '';
$databaseName = 'csdl';

try {
		$connect = new PDO('mysql:host=' . $hostName . ';dbname=' . $databaseName, $userName, $passWord);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // echo 'thành công';
} catch (PDOException $e) {
    //thất bại
	die($e->getMessage());
}

function detail_products($product_cat,$product_brand,$product_title,$product_price,$product_desc,$product_image,$product_keywords, $id)
{

	global $connect;
	try{
		$update_product = "UPDATE products SET 
		product_cat = '$product_cat' 
		,product_brand = '$product_brand'
		,product_title ='$product_title'
		,product_price ='$product_price'
		,product_desc ='$product_desc'
		,product_image ='$product_image'
		,product_keywords = '$product_keywords'
		WHERE product_id = '$id'";

		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$connect->exec($update_product);
echo 'Đã thêm thành công';	

	
	} catch(PDOException $e){
		die("ERROR: Không thể thực thi truy $update_product. " . $e->getMessage());
	}
	
}
function showw_product(){

	global $connect;
	$sql = $connect-> query('SELECT * FROM products');
	$sql->setFetchMode(PDO::FETCH_ASSOC); //tạo ra 1 mảng kết hợp, lập mục tiêu theo cột
	return $sql;
}
?>