<?php 

	$search = isset($_GET['search'])? $_GET['search']: '';

	$pdo = new PDO('mysql:dbname=classicmodels;host=localhost', 'root', '');

	$sql = "SELECT productLine FROM productlines WHERE productLine LIKE ?";
	$statement = $pdo->prepare($sql);
	$statement->execute(array('%'.$search.'%'));

	$result = $statement->fetchAll(PDO::FETCH_ASSOC);

	header('application/json');

	echo json_encode(formatDataForSelect2($result));

	function formatDataForSelect2($result){
		$productLines = array();
		foreach ($result as $key => $row) {
			// [{ 'id': 1, 'text': 'xxxxx'}, .....]
			$productLines[] = array(
				'id' 	=> $key + 1,
				'text'  => $row['productLine']
			);
		}
		// { 'results' : [{}, {}, {}] }
		$returnData = array('results' => $productLines);
		return $returnData;
	}