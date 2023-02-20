
<?php
class StatisticModel
{

  private $conn;

  public $author;


  public function __construct($db)
  {
    $this->conn = $db;
  }

  //GET All Posts

  public function readAdminNumbers()
  {
    // Create query
    $query  = 'SELECT * FROM  users WHERE admin="1"';
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt->rowCount();
  }

  public function readUserNumbers()
  {
    // Create query
    $query  = 'SELECT * FROM  users WHERE admin="0"';
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt->rowCount();
  }

  public function readCategoryNumber()
  {
    // Create query
    $query  = 'SELECT * FROM category WHERE author=?';
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    
    $stmt->bindParam(1, $this->author);
    // Execute query
    $stmt->execute();

    return $stmt->rowCount();
  }

  public function readPostNumber()
  {
    // Create query
    $query  = 'SELECT * FROM posts WHERE author=?';
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->author);
    // Execute query
    $stmt->execute();
    return $stmt->rowCount();
  }
}

?>
