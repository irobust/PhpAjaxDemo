<?php 
$product = isset($_GET['term'])? $_GET['term']: '';

$pdo = new PDO('mysql:dbname=classicmodels;host=localhost', 'root', '');

$sql  = "SELECT productName label, productCode FROM products ";
if(isset($_GET['term']))
	$sql .= "WHERE productName LIKE ? LIMIT 10";
else
	$sql .= "LIMIT 10";

$statement = $pdo->prepare($sql);

$statement->execute(array('%'.$product.'%'));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($result);