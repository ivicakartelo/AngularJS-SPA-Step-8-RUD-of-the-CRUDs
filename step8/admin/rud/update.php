<?php  

define("DB_HOST", "localhost");
	define("DB_USERNAME", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "cmsoop");

$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
$http_data = json_decode(file_get_contents("php://input"));

$x = array(
 ':name'  => $http_data->name,
 ':content'  => $http_data->content,
 ':published'    => $http_data->published,
 ':menu_id'    => $http_data->menu_id
);

$sql = "
 UPDATE menu 
 SET name = :name, content = :content, published = :published 
 WHERE menu_id = :menu_id
";

$stmt = $conn->prepare($sql);
$stmt->execute($x)
?>