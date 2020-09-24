<?php  

define("DB_HOST", "localhost");
	define("DB_USERNAME", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "cmsoop");

$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

 

$sql = "SELECT * FROM menu ORDER BY menu_id DESC";
$stmt = $conn->prepare($sql);
if($stmt->execute())
{
  while($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    $y[] = $row;
  }
  echo json_encode($y);
}

?>
