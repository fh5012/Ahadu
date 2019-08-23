<?php 
include_once("Database/db.php");
$id = $_GET['id'];
 
//deleting the row from table
$sql = "DELETE FROM product WHERE id=:id";
$query = $DB_con->prepare($sql);
$query->execute(array(':id' => $id));
 
//redirecting to the display page (index.php in our case)
header("Location:admin.php");