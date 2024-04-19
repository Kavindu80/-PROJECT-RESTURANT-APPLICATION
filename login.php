<?php
include("header.php");
?>
<html lang="en">

<head>
  <title>Login Portal</title>
  <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
  <div class="logo text-center my-3">Food Cabin</div>

  <div class="container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col col-10 col-md-6 m-2">
        <form action="admin/login-db.php" method="post">
          <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
          </div>
          <button type="submit" class="btn btn-primary mt-3">Login</button>
          <a href="home.php" class="btn btn-danger mt-3">Back</a>
        </form>
      </div>
    </div>
  </div>
</body>

</html>