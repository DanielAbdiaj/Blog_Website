<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up</title>
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


  <!-- HEADER START -->
  <section class="container py-2 mb-4 ">
    <div class="row">
      <div class="offset-lg-1 col-lg-10" style="padding: 50px;">

        <?php
        if (isset($_GET["error"])) {
          $Output = "<div class=\"alert alert-danger\">";
          $Output .= htmlentities($_GET["error"]);
          $Output .= "</div>";
          echo $Output;
        }
        ?>
        <form class="form" action="./includes/signup.php" method="POST">
          <div class="card bg-dark text-light mb-3">
            <div class="card-header">
              <h4><i class="fa-solid fa-user-plus pr-2"></i> Signup Form</h4>
            </div>
            <div class="card-body bg-light shadow-lg">
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
                  <a href="index.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back to Home</a>
                </div>
                <div class="col-lg-6 mb-2">
                  <button type="submit" name="Submit" class="btn btn-success btn-block">
                    <i class="fa-solid fa-user-plus"></i> SignUp
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>

  </section>
  <!-- HEADER END -->

  <!-- Main Area START-->


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

  </script>
</body>

</html>