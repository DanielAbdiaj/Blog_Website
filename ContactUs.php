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

                </ul>
            </div>
        </div>
    </nav>

    <!-- NAVBAR END -->

    <div class="container my-5">
        <h1 class="text-center">Contact Us</h1>
        <hr />
        <div class="d-flex justify-content-center row my-4">
            <div class="col-9">
                <p>
                    Welcome to our Contact Us page! We value your feedback and suggestions,
                    and are always here to help with any questions or concerns you may have.
                    Whether you want to get in touch with us to share your thoughts, ask
                    a question, or just say hello, you can do so by either sending us an
                    email or connecting with us on our social media channels. Our email
                    addresses and social media links are provided below.
                    Thank you for visiting our website, and we look
                    forward to hearing from you.
                </p>

            </div>

        </div>

        <hr />
        <div class="d-flex justify-content-around mt-5">
            <div class="d-flex flex-column">
                <h4>Redi Ceni</h4>
                <a href="mailto:rceni20@epoka.edu.al">rceni20@epoka.edu.al</a>
                <div class="d-flex justify-content-around mt-4">
                    <a href="https://www.linkedin.com/in/redi-ceni/">
                        <i class="fab fa-linkedin fa-2x"></i>
                    </a>
                    <a href="https://github.com/rediceni">
                        <i class="fab fa-github fa-2x ml-4"></i>
                    </a>
                    <a href="https://www.instagram.com/redceni/">
                        <i class="fab fa-instagram fa-2x ml-4"></i>
                    </a>
                </div>
            </div>
            <div class="d-flex flex-column">
                <h4>Daniel Abdiaj</h4>
                <a href="mailto:dabdiaj20@epoka.edu.al">dabdiaj20@epoka.edu.al</a>
                <div class="d-flex justify-content-around mt-3">
                    <a href="https://www.linkedin.com/in/daniel-abdiaj-327826230/">
                        <i class="fab fa-linkedin fa-2x mr-4"></i>
                    </a>
                    <a href="https://github.com/DanielAbdiaj">
                        <i class="fab fa-github fa-2x mr-4"></i>
                    </a>
                    <a href="https://www.instagram.com/daniel_abdiaj/">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

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

</body>

</html>