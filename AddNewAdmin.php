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
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

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
    <div style="height:25px;"></div>
    <!-- NAVBAR END -->

    <!-- HEADER START -->

    <header class="bg-lighttext-white py-2">
        <div class="container">
            <div class="row mt-2" id="Row">
                <h3 class="lead " style="font-size:30px; font-weight:bold ;"><i class="fa-solid fa-user-secret" style="margin-right:20px;"></i>MANAGE ADMINS </h3>
            </div>
        </div>
    </header>
    <!-- HEADER END -->

    <!-- Main Area START-->

    <section class="container py-2 mb-4 ">
        <div class="row">
            <div class="offset-lg-1 col-lg-10" style="padding: 20px;">
                <?php
                if (isset($_GET["error"])) {
                    $Output = "<div class=\"alert alert-danger\">";
                    $Output .= htmlentities($_GET["error"]);
                    $Output .= "</div>";
                    echo $Output;
                }

                ?>
                <form class="form" action="./includes/newAdmin.php" method="POST">
                    <div class="card bg-dark text-light mb-3 shadow-lg">
                        <div class="card-header">
                            <h4>Add New Admin</h4>
                        </div>
                        <div class="card-body bg-light ">
                            <div class="form-group"><label for="username"> <span class="FieldInfo"> Username: </span></label>
                                <input class="form-control" type="text" name="Username" id="username" placeholder="Type username here">
                            </div>
                            <div class="form-group"><label for="email"> <span class="FieldInfo">Email: </span></label>
                                <input class="form-control" type="email" name="Email" id="email" placeholder="Type email here">
                            </div>
                            <div class="form-group"><label for="password"> <span class="FieldInfo"> Password: </span></label>
                                <input class="form-control" type="password" name="Password" id="password" placeholder="Type password here">
                            </div>
                            <div class="form-group"><label for="confirmPassword"> <span class="FieldInfo">Confirm Password: </span></label>
                                <input class="form-control" type="password" name="ConfirmPassword" id="confirmPassword" placeholder="Confirm password here">
                            </div>
                            <div class="row pt-2">
                                <div class="col-lg-6 mb-2">
                                    <a href="AdminBlogPage.php?admin=<?php echo $_SESSION["username"] ?>" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <button type="submit" name="Submit" class="btn btn-success btn-block">
                                        <i class="fa-solid fa-user-secret mr-1"></i> Add New Admin
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
                            // script fot the navbar collapse
            var btn = document.getElementById("collapseBtn");
            var element = document.getElementById("myCollapse");

            // Create a collapse instance, toggles the collapse element on invocation

            var myCollapse = new bootstrap.Collapse(element, {
            toggle: false,
            });

            btn.addEventListener("click", function () {
            myCollapse.toggle();
            });

            //prints the year in the footer
            const year = new Date().getFullYear();
            document.querySelector("#year").innerHTML = ` ${year}`;
    </script>
</body>

</html>