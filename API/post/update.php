<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../classes/DB.php';
include_once '../../models/PostModel.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->getConnection();

// Instantiate blog post object
$post = new PostModel($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));


if (empty($data->title)) {
  echo json_encode(
    array('danger' => 'Title can not be empty')
  );
} elseif (strlen($data->title) < 5) {
  echo json_encode(
    array('danger' => 'Post Title should be greater than 5 characters')
  );
} elseif (strlen($data->text) > 9999) {
  echo json_encode(
    array('danger' => 'Post Description should be less than than 10000 characterss')
  );
} else {

  // Set ID to update
  $post->id = $data->id;

  $post->PostTitle = $data->title;
  $post->PostText = $data->text;
  $post->Image = $data->image;
  $post->Category = $data->category;


  // Update post
  if ($post->update()) {
    echo json_encode(
      array('success' => 'Post updated Successfully')
    );
  } else {
    echo json_encode(
      array('danger' => 'Something went wrong. Try Again !')
    );
  }
}
