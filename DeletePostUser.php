<?php

include "./includes/login.php";

session_start();


if (!isset($_SESSION["id"])) {
    header("location: LoginPage.php?error=You Need To Login please!");
} else {
    if ($_SESSION["admin"] == true) {
        header("location: LoginPage.php?error=You are not a User please Login as User");
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DeletePost</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- NAVBAR START-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg p-3"><!-- expands on larger screen -->

        <!-- container adds margin on the right and left -->
        <div class="container">

            <a href="#" class="navbar-brand"><i class="fa-brands fa-blogger-b"></i></a>

            <button class="navbar-toggler" id="collapseBtn">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="myCollapse" style="justify-content: space-around;">
                <ul class="navbar-nav">
                    <!-- 1 -->
                    <li class="nav-item px-3">
                        <a href="MyProfile.php" class="nav-link text-success"><i class="fa-solid fa-user"></i> My Profile</a>
                    </li>
                    <!-- 3 -->
                    <li class="nav-item px-3">
                        <a href="AddNewPostUser.php?user=<?php echo $_SESSION["username"] ?>" class="nav-link text-info"><i class="fas fa-edit"></i> Add New Post</a>
                    </li>
                    <!-- 4 -->
                    <li class="nav-item px-3">
                        <a href="index.php" target="_blank" class="nav-link text-warning"><i class="fa-solid fa-square-rss"></i> Live Blog</a>
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

 <header class="bg-lighttext-white mt-5">
        <div class="container">
            <div class="row mt-2" id="Row">
                <h3 class="lead" style="font-size:30px; font-weight:bold ;"><i class="fas fa-edit"></i>  DELETE POST </h3>
            </div>
        </div>
    </header>
    <!-- HEADER END -->

    <!-- Main Area START-->

    <section class="container py-2 mb-4">
        <div class="row">

            <div class="offset-lg-1 col-lg-10" style="padding:50px;">


                <form class="form" action="" method="post" enctype="multipart/form-data"><!-- enctype is used to handle the images -->
                    <div class="card bg-secondary text-light mb-3">
                        <div class="card-body bg-light">

                            <div class="form-group">
                                <label for="title"> <span class="FieldInfo">Post Title:</span></label>
                                <input class="form-control" type="text" name="PostTitle" id="title" value="">
                            </div>

                            <div class="form-group">
                                <label for="CategoryTitle"> <span class="FieldInfo">Post Category:</span></label>
                                <select class="form-control" id="CategoryTitle" name="Category">

                                </select>
                            </div>

                            <div class="form-group">
                                <span class="FieldInfo">Existing Image: </span>
                                <br>
                                <img class="mb-1 my-3" src="" width="300px" ; height="150px" ; id="imagePhoto">
                            </div>
                            <div class="form-group">
                                <label for="Post"> <span class="FieldInfo"> Post: </span></label>
                                <textarea class="form-control" id="Post" name="PostDescription" rows="8" cols="80">

                                </textarea>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <a href="UserBlogPage.php?user=<?php echo $_SESSION["username"] ?>" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <button type="submit" name="Submit" class="btn btn-danger btn-block">
                                        <i class="fa-solid fa-trash-can"></i> Delete Post
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <!-- Main Area END-->

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
        <?php require_once("scripts/DeletePost.js"); ?>
    </script>
</body>

</html>