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
        <h1 class="text-center">About Us</h1>
        <hr />
        <div class="d-flex justify-content-center row my-4">
            <div class="col-10">
                <p>
                    Welcome to our blog! We are Daniel and Redi, two
                    computer engineering students with a passion for knowledge and
                    creativity. Our blog is a platform for anyone to share their
                    insights, experiences, and passions with a wider audience. From
                    technology to sports, culture to art, and everything in between,
                    our blog covers a wide range of topics that interest and inspire us.
                    Our goal is to create a community where ideas and perspectives can
                    be shared and exchanged, in the hopes of fostering a better
                    understanding of the world and the people around us.
                </p>
                <br>
                <p>
                    We believe that everyone has something valuable to contribute, and
                    that everyone can learn something new from one another. Whether you
                    are a student, a professional, or simply someone with a passion for
                    a particular subject, we encourage you to share your thoughts and
                    perspectives with our community. Our blog is not just a platform
                    for us to share our own insights, but for anyone to share theirs
                    as well. We hope that by creating a space for open and honest
                    exchange, we can build a community that is both informative and
                    supportive. Thank you for visiting, and we look forward to reading
                    your posts!
                </p>
            </div>

        </div>
        <hr>

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