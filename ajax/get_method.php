<?php 
	$productLine = $_GET['product-line'];
	
	// input validation

	$sql  = "SELECT productCode, productName, productVendor, buyPrice, quantityInStock as Quantity ";
	$sql .= "FROM products ";
	$sql .= "WHERE productLine LIKE ?";

	$pdo = new PDO('mysql:dbname=classicmodels;host=localhost', 'root', '');
	$statement = $pdo->prepare($sql);
	$statement->execute(['%'.$productLine.'%']);

	$result = $statement->fetchAll(PDO::FETCH_ASSOC);

	// $statement->debugDumpParams();

	echo json_encode($result);


