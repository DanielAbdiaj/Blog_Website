<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../classes/DB.php';
include_once '../../models/PostModel.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->getConnection();

// Instantiate blog post object
$post = new PostModel($db);

// Set ID to update
$post->id = $_GET['id'];

// Delete post
if ($post->delete()) {
  echo json_encode(
    array('success' => 'Post Deleted Successfully!')
  );
} else {
  echo json_encode(
    array('danger' => 'Post Not Deleted')
  );
}
