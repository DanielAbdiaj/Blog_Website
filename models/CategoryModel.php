<?php


class CategoryModel
{

  private $conn;
  private $table = 'category';

  public $id;
  public $title;
  public $author;
  public $DateTime;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  //GET All Posts

  public function readAllCategories()
  {
    // Create query
    $query  = 'SELECT * FROM ' . $this->table . ' ORDER BY id DESC';
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function create()
  {

    // Create query

    $query = "INSERT INTO category(title,author,datetime)";
    $query .= "VALUES(:cN,:aN,:dT)";

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Bind data
    $stmt->bindValue(':cN', $this->title);
    $stmt->bindValue(':aN', $this->author);
    $stmt->bindValue(':dT', $this->DateTime);

    // Execute query
    $Execute = $stmt->execute();

    return ($Execute ? true : false);
  }
}
