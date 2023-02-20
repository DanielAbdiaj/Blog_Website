<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../classes/DB.php';
include_once '../../models/PostModel.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->getConnection();


// Instantiate blog post object
$post = new PostModel($db);


// Get ID
$post->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get post
$post->readSingle();

//   Create array
$post_arr = array(
  'id' => $post->id,
  'title' => htmlspecialchars($post->PostTitle, ENT_QUOTES | ENT_HTML5),
  'category' => $post->Category,
  'image' => $post->Image,
  'text' => htmlspecialchars($post->PostText, ENT_QUOTES | ENT_HTML5),
  'admin' => $post->Author,
  'datetime' => $post->DateTime
);

// Make JSON
echo json_encode($post_arr);
