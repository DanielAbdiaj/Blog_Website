<?php

class PostModel
{

  private $conn;
  private $table = 'posts';
  public $id;
  public $PostTitle;
  public $Category;
  public $Image;
  public $PostText;
  public $Author;
  public $DateTime;


  public function __construct($db)
  {
    $this->conn = $db;
  }

  //GET All Posts

  public function readAllPosts()
  {
    // Create query
    $query  = 'SELECT * FROM ' . $this->table . ' ORDER BY id DESC';
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function readAllUserPosts()
  {
    // Create query
    $query = 'SELECT * FROM ' . $this->table . ' WHERE author=? ORDER BY id DESC';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->Author);
    // Execute query
    $stmt->execute();

    return $stmt;
  }


  public function readSingle()
  {
    // Create query
    $query = 'SELECT * FROM ' . $this->table . ' WHERE id=? ';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute();

    $DataRows = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties

    $this->id             = $DataRows["id"];
    $this->DateTime       = $DataRows["datetime"];
    $this->PostTitle      = $DataRows["title"];
    $this->Category       = $DataRows["category"];
    $this->Author         = $DataRows["author"];
    $this->Image          = $DataRows["image"];
    $this->PostText       = $DataRows["post"];
  }

  public function create()
  {

    // Create query
    $query = 'INSERT INTO ' . $this->table . '(datetime,title,category,author,image,post)';
    $query .= "VALUES(:dT,:pT,:cN,:aN,:iN,:pD)";
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind data
    $stmt->bindValue(':dT', $this->DateTime);
    $stmt->bindValue(':pT', $this->PostTitle);
    $stmt->bindValue(':cN', $this->Category);
    $stmt->bindValue(':aN', $this->Author);
    $stmt->bindValue(':iN', $this->Image);
    $stmt->bindValue(':pD', $this->PostText);

    // Execute query
    $Execute = $stmt->execute();

    return ($Execute ? true : false);
  }


  public function readAllSearchedPosts($Search)
  {

    // Create query
    $query  = "SELECT * FROM posts WHERE 
    title LIKE :search
    OR category LIKE :search
    OR author LIKE :search";
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    $stmt->bindValue(':search', '%' . $Search . '%');
    // Execute query
    $stmt->execute();

    return $stmt;
  }

  // Update Post
  public function update()
  {
    // Create quer
    $query = "UPDATE posts SET title=:pT, category=:cN, post=:pD,image=:iN WHERE id='$this->id'";
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // // Bind data
    $stmt->bindValue(':pT', $this->PostTitle);
    $stmt->bindValue(':pD', $this->PostText);
    $stmt->bindValue(':cN', $this->Category);
    $stmt->bindValue(':iN', $this->Image);
    // Execute query
    $Execute = $stmt->execute();
    return ($Execute ? true : false);
  }


  // Delete Post
  public function delete()
  {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    //$this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':id', $this->id);

    // Execute query
    $Execute = $stmt->execute();
    return ($Execute ? true : false);
  }
}
