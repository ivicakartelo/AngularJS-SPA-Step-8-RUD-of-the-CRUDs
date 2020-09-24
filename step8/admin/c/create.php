<?php

    define("DB_HOST", "localhost");
	define("DB_USERNAME", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "cmsoop");

$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

$feedBack = '';

$a = json_decode(file_get_contents("php://input"));

$b = array(
	':name'  => $a->name,
	':content'  => $a->content,
	':published'  => $a->published
   );

$sql = "
 INSERT INTO menu 
 (name, content, published) VALUES 
 (?, ?, ?)
";

$stmt = $conn->prepare($sql);
$params = [$a->name, $a->content, $a->published];
if($stmt->execute($params))
{
	$feedBack = 'You just created the row';
}
$output = array(
	'feedBack' => $feedBack
);
   
echo json_encode($output);
?>