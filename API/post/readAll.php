<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../classes/DB.php';
include_once '../../models/PostModel.php';


// Instantiate DB & connect
$database = new Database();
$db = $database->getConnection();

// Instantiate blog post object
$post = new PostModel($db);

if (isset($_GET['Search'])) {

  if (empty($_GET["Search"])) {
    $result = $post->readAllPosts();
  } else {
    $result = $post->readAllSearchedPosts($_GET["Search"]);
  }
} else if (isset($_GET['admin'])) {
  $post->Author = $_GET['admin'];
  $result = $post->readAllUserPosts();
} else if (isset($_GET['user'])) {
  $post->Author = $_GET['user'];
  $result = $post->readAllUserPosts();
} else {
  $result = $post->readAllPosts();
}


// Blog post query 
//  $result = $post->readAllPosts();
// Get row count
$num = $result->rowCount();

//  Check if any posts
if ($num > 0) {

  // Post array
  $posts_arr = array();


  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $post_data = array(
      'id' => $id,
      'title' => htmlspecialchars($title, ENT_QUOTES | ENT_HTML5),
      'category' => $category,
      'image' => $image,
      'text' => htmlspecialchars($post, ENT_QUOTES | ENT_HTML5),
      'admin' => $author,
      'datetime' => $datetime
    );

    array_push($posts_arr, $post_data);
  }

  // Turn to JSON & output
  echo json_encode($posts_arr);
} else {
  // No Posts
  echo json_encode(
    array('danger' => 'No Posts Found')
  );
}
