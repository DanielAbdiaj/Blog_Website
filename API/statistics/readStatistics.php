<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../classes/DB.php';
include_once '../../models/StatisticsModel.php';


// Instantiate DB & connect
$database = new Database();
$db = $database->getConnection();

// Instantiate blog post object
$statistics = new StatisticModel($db);

if(isset($_GET['admin']) ){
    $statistics->author =$_GET['admin'];
}
else{
    $statistics->author =$_GET['user'];
}

    $statistics_data = array(
      'postNr' => $statistics->readPostNumber(),
      'categoryNr' => $statistics->readCategoryNumber(),
      'adminNr' => $statistics->readAdminNumbers(),
      'userNr' => $statistics->readUserNumbers()

    );

  // Turn to JSON & output
  echo json_encode($statistics_data);
