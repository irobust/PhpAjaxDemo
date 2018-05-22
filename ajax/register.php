<?php
	$firstname = $_POST['firstname'];
	$lastname  = $_POST['lastname'];

	// input validation

	$pdo = new PDO('mysql:dbname=classicmodels;host=localhost', 'root', '');

	$sql = "INSERT INTO register(firstname, lastname) VALUES(:firstname, :lastname)";
	$statement = $pdo->prepare($sql);
	$result = $statement->execute([ 
					':firstname' => $firstname, 
					':lastname'  => $lastname 
			  ]);

	// { 'success' : true }
	// { 'success' : false }
	$jsonResult = array('success' => $result);

	header('Content-Type: application/json');
	echo json_encode($jsonResult);
