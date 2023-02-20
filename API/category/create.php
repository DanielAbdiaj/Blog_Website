
<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


include_once '../../classes/DB.php';
include_once '../../models/CategoryModel.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->getConnection();

// Instantiate blog post object
$category = new CategoryModel($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));


// I need to validate the raw data

if (empty($data->title)) {
  echo json_encode(
    array('danger' => 'Title can not be empty')
  );
} elseif (strlen($data->title) < 3) {
  echo json_encode(
    array('danger' => 'Category Title should be greater than 2 characters')
  );
} elseif (strlen($data->title) > 49) {
  echo json_encode(
    array('danger' => 'Category Title should be less than than 50 characters')
  );
} else {
  $category->title = $data->title;
  $category->author = $data->admin;


  date_default_timezone_set("Europe/Tirane"); //setting the time
  $datetime = date("Y-m-d h:i:sa");

  $category->DateTime = $datetime;

  if ($category->create()) {

    echo json_encode(
      array('success' => 'Category ' . $category->title . ' added Successfully')
    );
  } else {
    echo json_encode(
      array('danger' => 'Something went wrong. Try Again !')
    );
  }
}
