<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
  <?php 
  $conn = new mysqli('localhost','root','','shopping');
  if (!$conn)
  {
  	echo"ket noi that bai";
  }
  $sql="Select*from account";
  $result =mysqli_query($conn,$sql);
  while($row =mysqli_fetch_array($result))
  {
  	print $row[0];
  	print "\n";
  	print $row[1];
  	print "<br>";
  }


   ?>
   <form method="GET">
  UserName:
   	<input type="text" name="name" >
  Password:
   		<input type="text" name="age" >
   	<button type="submit">Press me!</button>
   </form>
</body>
</html>