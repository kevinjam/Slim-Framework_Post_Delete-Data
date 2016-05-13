<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;
// $app->get('/hello/{name}', function (Request $request, Response $response) {
//     $name = $request->getAttribute('name');
//     $response->getBody()->write("Hello aggregate_info(object), $name");

//     return $response;
// });

// $app->get('/books/{id}', function ($request, $response, $args) {
//     // Show book identified by $args['id']
//     echo "hello books";
// });

require_once('../app/api/books.php');
//require_once('../app/api/student.php');

$app->run();