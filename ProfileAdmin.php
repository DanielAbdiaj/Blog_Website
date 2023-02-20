<?php

include "./includes/login.php";

session_start();


if (!isset($_SESSION["id"])) {
  header("location: LoginPage.php?error=You Need To Login please!");
} else {
  if ($_SESSION["admin"] == false) {
    header("location: LoginPage.php?error=You are not Admin please Login as Admin");
  }
}   
?> 

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyProfile</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body class="d-flex flex-column min-vh-100">
  <!-- NAVBAR START-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg p-3"><!-- expands on larger screen -->

    <!-- container adds margin on the right and left -->
    <div class="container">

      <a href="AdminBlogPage.php?admin=<?php echo $_SESSION["username"] ?>" class="navbar-brand"><i class="fa-brands fa-blogger-b"></i></a>

      <button class="navbar-toggler" id="collapseBtn">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="myCollapse" style="justify-content: space-around;">
        <ul class="navbar-nav">
          <!-- 1 -->
          <li class="nav-item px-3">
            <a href="ProfileAdmin.php?admin=<?php echo $_SESSION["username"] ?>" class="nav-link text-success"><i class="fa-solid fa-user"></i> My Profile</a>
          </li>
          <!-- 3 -->
          <li class="nav-item px-3">
            <a href="AddNewPost.php?admin=<?php echo $_SESSION["username"] ?>" class="nav-link text-primary"><i class="fas fa-edit"></i> Add New Post</a>
          </li>
          <!-- 4 -->
          <li class="nav-item px-3">
            <a href="Categories.php?admin=<?php echo $_SESSION["username"] ?>" class="nav-link text-info"><i class="fas fa-folder-plus"></i> Add New Category</a>
          </li>
          <!-- 5 -->
          <li class="nav-item px-3">
            <a href="AddNewAdmin.php" class="nav-link text-warning"><i class="fas fa-user-plus"></i> Add New Admin</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link mx-2" style="font-weight:bold;color:#CDCDC5;font-family:Roboto,sans-serif;"><?php echo $_SESSION["username"] ?></a></li>
          <li class="nav-item"><a href="./includes/logout.php" class="nav-link text-danger">
              <i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- NAVBAR END -->

  <!-- HEADER START -->
  <header class="bg-lighttext-white py-3">
    <div class="container">
      <div class="row mt-2" id="Row">
        <h3 class="lead mb-3 mt-2 ml-3" style="font-size:30px; font-weight:bold;"><i class="fa-solid fa-user mr-2"></i> <?php echo $_SESSION["username"] ?> </h3>
      </div>
    </div>
  </header>
  <!-- HEADER END -->



  <section class="container py-2 mb-4">
    <div class="row">
      <!-- Left Side Area Start -->
      <div class="col-lg-2 d-none d-md-block">
        <div class="card text-center bg-dark text-white mb-3 shadow-lg">
          <div class="card-body">
            <h1 class="lead">My Posts</h1>
            <h4 class="display-5" id="post">
              <i class="fab fa-readme"></i>
            </h4>
          </div>
        </div>

        <div class="card text-center bg-dark text-white mb-3 shadow-lg">
          <div class="card-body">
            <h1 class="lead">My Categories</h1>
            <h4 class="display-5" id="category">
              <i class="fas fa-folder"></i>
            </h4>
          </div>
        </div>

        <div class="card text-center bg-dark text-white mb-3 shadow-lg">
          <div class="card-body">
            <h1 class="lead">Total Admins</h1>
            <h4 class="display-5" id="admin">
            <i class="fa-solid fa-user-secret"></i>
            </h4>
          </div>
        </div>

        <div class="card text-center bg-dark text-white mb-3 shadow-lg">
          <div class="card-body">
            <h1 class="lead">Total Users</h1>
            <h4 class="display-5" id="users">
              <i class="fas fa-users"></i>
            </h4>
          </div>
        </div>

      </div>
      <!-- Left Side Area End -->
      <!-- Right Side Area Start -->
      <div class="col-lg-10" id="PublicSite">

      </div>
      <!-- Right Side Area End -->
    </div>
  </section>

  <!-- FOOTER START-->

  <footer class="mt-auto bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col">
          <p class="load text-center">Footer | Blog |<span id="year"></span> &copy; ---All Rights Reserved</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- FOOTER END -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    <?php require_once("scripts/Profile.js"); ?>
  </script>
</body>

</html>