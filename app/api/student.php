<?php
$app = new \Slim\App();
$app->get('/api/student', function ($request, $response, $args) {
    // Show book identified by $args['id']
require_once('dbconnect.php');

	$query = "select * from students order by id";
	$result = $mysqli->query($query);
	while ($row = $result->fetch_assoc()) {

		$res [] = $row;

		# code...
	}
	if (isset($res)) {
		# code...
		header('Content-Type: application/json');
		echo json_encode($res);
	}else{
		echo "Error";
	}



});