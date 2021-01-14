<?php 

$hostName = '34.200.32.20';
$userName = 'huyen';
$passWord = '123@123a';
$databaseName = 'huyendb';

try {
		$connect = new PDO('mysql:host=' . $hostName . ';dbname=' . $databaseName, $userName, $passWord);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // echo 'thành công';
} catch (PDOException $e) {
    //thất bại
	die($e->getMessage());
}


function add_Cate($name_cate)
{

	global $connect;
	$sql = "INSERT INTO category(name_cate) VALUES('$name_cate')";
	$connect->exec($sql);
	echo 'Đã thêm thành công';	
}
function show_Cate(){

	global $connect;
	$sql = $connect-> query('SELECT * FROM category');
	$sql->setFetchMode(PDO::FETCH_ASSOC);
	return $sql;
}

function add_brand($name_brand)
{

	global $connect;
	$sql = "INSERT INTO brand(name_brand) VALUES('$name_brand')";
	$connect->exec($sql);
	echo 'Đã thêm thành công';	
}
function show_brand(){

	global $connect;
	$sql = $connect-> query('SELECT * FROM brand');
	$sql->setFetchMode(PDO::FETCH_ASSOC);
	return $sql;
}
function add_products($product_cat,$product_brand,$product_title,$product_price,$product_desc,$product_image,$product_keywords)
{
	global $connect;
	$insert_product = "INSERT INTO products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) 
	values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords') ";

	$connect->exec($insert_product);
	echo 'Đã thêm thành công';	
	/*header('Location: http://localhost/Linkhtml/Asm2_SDLC/view_product.php');*/
	/*$newURL = "index_product.php";
	header('Location: '.$newURL);*/

}
function update_products($product_cat,$product_brand,$product_title,$product_price,$product_desc,$product_image,$product_keywords, $id)
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
echo 'Đã sửa thành công';	

	
	} catch(PDOException $e){
		die("ERROR: Không thể thực thi truy $update_product. " . $e->getMessage());
	}
	
}
/*function search_product($product_keywords, $product_desc){
	$search_keyword = '';= '';
if(!empty($_POST['search']['product_keywords'])) {if(!empty($_POST['search']['product_keywords'])) {
	$search_keyword = $_POST['search']['product_keywords'];= $_POST['search']['product_keywords'];
}}
$sql = 'SELECT * FROM products WHERE post_title LIKE :keyword OR description LIKE :keyword OR post_at LIKE :keyword 
ORDER BY id DESC ';= 'SELECT * FROM posts WHERE post_title LIKE :keyword OR description LIKE 
:keyword OR post_at LIKE :keyword ORDER BY id DESC ';
......
......
$pdo_statement = $pdo_conn->prepare($query);= $pdo_conn->prepare($query);
$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
$pdo_statement->execute();->execute();
$result = $pdo_statement->fetchAll();= $pdo_statement->fetchAll();
};*/
function show_product(){

	global $connect;
	$sql = $connect-> query('SELECT * FROM products');
	$sql->setFetchMode(PDO::FETCH_ASSOC); //tạo ra 1 mảng kết hợp, lập mục tiêu theo cột
	return $sql;
}
function add_user($user, $pass)
{

	global $connect;
	$sql = "INSERT INTO userx(name_user, pass_user) VALUES('$user', '$pass')";
	$connect->exec($sql);
	
}

function add_admin($admin, $pass_admin)
{

	global $connect;
	$sql = "INSERT INTO admin(admin_name, admin_pass) VALUES('$admin', '$pass_admin')";
	$connect->exec($sql);

}

function show_user()
{
	global $connect;
	$sql =$connect->query("SELECT * FROM userx");
	$sql->setFetchMode(PDO::FETCH_ASSOC);// trả về dữ liệu dạng mảng với key là tên của column
	return $sql;

}
function show_admin()
{
	global $connect;
	$sql =$connect->query("SELECT * FROM admin");
	$sql->setFetchMode(PDO::FETCH_ASSOC);
	return $sql;
	  

}
function xoa_cookie($name){
	setcookie( "name", "", time()- 60, "/","", 0);
	header('Location: index.php');
}

?>
