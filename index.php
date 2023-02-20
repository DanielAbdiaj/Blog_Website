<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Page</title>
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
                <ul class="navbar-nav mr-auto">

                    <!-- 2 -->
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <!-- 3 -->
                    <li class="nav-item">
                        <a href="AboutUs.php" class="nav-link">About Us</a>
                    </li>
                    <!-- 4 -->
                    <li class="nav-item">
                        <a href="ContactUs.php" class="nav-link">Contact us</a>
                    </li>

                    <?php


                    include "./includes/login.php";

                    session_start();

                    if (!isset($_SESSION["id"])) {
                    ?>
                        <!-- 5 -->
                        <li class="nav-item">
                            <a href="SignupPage.php" class="nav-link">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a href="LoginPage.php" class="nav-link">Login</a>
                        </li>
                    <?php } ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <form class="form-inline d-none d-sm-block" action="BlogPublicSite.php">
                        <div class="form-group">
                            <input class="form-control mr-2" type="text" name="Search" placeholder="Search here" value="" id="searchBar">
                            <button class="btn btn-primary" name="SearchButton" id="searchBtt">Go</button>
                        </div>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->


    <!-- HEADER START -->
    <header class="bg-lighttext-white py-3">
        <div class="container">
            <?php
            if (isset($_GET["error"])) {
                $Output = "<div class=\"alert alert-danger\">";
                $Output .= htmlentities($_GET["error"]);
                $Output .= "</div>";
                echo $Output;
            } ?>
            <div class="row mt-2" id="Row">
                <!-- MAIN HEADER AREA START -->
                <div class="col-sm-8" id="PublicSite">
                    <h3>The Complete Responsive Blog</h3>
                    <h3 class="lead mb-5">The Complete blog by using PHP</h3>


                </div>
                <!-- MAIN HEADER AREA END -->
            </div>
        </div>
    </header>
    <!-- HEADER END -->

    <!-- Main Area START-->


    <!-- Main Area END-->

    <!-- FOOTER START-->

    <footer class="mt-auto bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="load text-center">Footer | Blog |<span id="year"></span> &copy; ---All rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- FOOTER END -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php require_once("scripts/PublicBlogSite.js"); ?>
    </script>
</body>

</html>