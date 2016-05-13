<?php
// Displaying the records from the Tables
$app->get('/api/books', function(){
	//echo "books I will Keep My DB here";
	require_once('dbconnect.php');

	$query = "select * from books order by id";
	$result = $mysqli->query($query);
	while ($row = $result->fetch_assoc()) {

		# code...
		$data [] = $row;
	}

	echo json_encode($data, true);

});


// Display Single Row
$app->get('/api/books/{id}', function ($request) {
    // Show book identified by $args['id']
    require_once('dbconnect.php');
    $id = $request->getAttribute('id');

    //$query = 'select * from books';
    $query = "select * from books where id = $id";
$result = $mysqli->query($query);

   $data[] = $result->fetch_assoc();
	header('Content-Type: application/json');
	echo json_encode($data);
});
    // Insert from the Db

$app->post('/api/books', function($request) {
  // $name = $_POST['name'];
  //   // echo "hello".$name;
  //  echo 'the value was'.$name;

	 require_once('dbconnect.php');

	 //$query = "INSERT INTO 'books' ('book_title', 'author', 'amazon_url') VALUES(?,?,?)";
	 $query = "INSERT INTO `books` (`book_title`, `author`, `amazon_url`) VALUES (?,?,?)";
	 $stmt= $mysqli->prepare($query);
	 $stmt->bind_param("sss",$a, $b, $c);

	 $a = $request->getParsedBody()['book_title'];
	 $b = $request->getParsedBody()['author'];
	 $c = $request->getParsedBody()['amazon_url'];

	 $stmt->execute();

});