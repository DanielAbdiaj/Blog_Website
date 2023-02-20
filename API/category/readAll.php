<?php


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../classes/DB.php';
include_once '../../models/CategoryModel.php';


// Instantiate DB & connect
$database = new Database();
$db = $database->getConnection();

// Instantiate blog post object
$category = new CategoryModel($db);

// Blog post query
$result = $category->readAllCategories();
// Get row count
$num = $result->rowCount();

// Check if any posts
if ($num > 0) {

  // Post array
  $categories_arr = array();


  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $categories_data = array(
      'id' => $id,
      'title' => htmlspecialchars($title, ENT_QUOTES | ENT_HTML5),
      'admin' => $author,
      'datetime' => $DateTime
    );

    array_push($categories_arr, $categories_data);
  }

  // Turn to JSON & output
  echo json_encode($categories_arr);
} else {
  // No Posts
  echo json_encode(
    array('danger' => 'No Categories Found')
  );
}
