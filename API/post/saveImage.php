<?php

$location = "../../uploads/" . basename($_FILES['file']['name']);

if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
  echo json_encode(
    array('message' => 'Post saved in folder')
  );
} else {
  echo json_encode(
    array('message' => 'Post not saved in folder')
  );
}
