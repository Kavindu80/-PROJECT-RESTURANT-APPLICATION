<!DOCTYPE html>
<html lang="en">
<?php
include("nav.php")
?>

<head>
  <title>Home</title>
</head>

<body>
  <section class="hero">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h1 class="mb-4">Find Your Favorite Recipes<br> and Foods at Food Cabin</h1>
          <p class="px-1 m-auto">Food Cabin is the perfect place to find recipes and foods for any occasion. Whether you're looking for a quick and easy meal to cook at home or a special occasion dinner to enjoy at our restaurant, we have you covered.</p>
          <button class="btn btn-primary mt-4"><a href="shop.php"><i class="bi bi-shop me-1"></i> Shop</a></button>
        </div>
      </div>
    </div>
  </section>
  <section class="latest">
    <h2 class="text-center mb-4">Latest Food & Baverages</h2>
    <div class="container">
      <div class="row row-cols-1 row-cols-md-3">


        <?php
        include("admin/db/db.php");
        $results = $conn->query("SELECT * FROM food_items ORDER BY price ASC LIMIT 3");

        // Loop through the results and display them on the web page
        foreach ($results as $row) {
          echo '<div class="col">';
          echo '<div class="card mb-3">';
          echo "<img src='admin/uploads/" . $row["image"] . "' alt='" . $row["title"] . "' />";
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $row["title"] . '</h5>';
          echo '<h6 class="card-title">Price : ' . $row["price"] . "</h6>";
          echo '<p class="card-text">' . $row["description"] . "</p>";
          echo '<button class="btn btn-primary"><a href="shop.php"><i class="bi bi-shop me-1"></i> Shop</a></button>';
          echo "</div>";
          echo "</div>";
          echo "</div>";
        }

        // Close the connection
        $conn = null;
        ?>

      </div>
    </div>
  </section>
  <section class="contact" id="contact">
    <div class="container">
      <div class="row">
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="col m-auto col-12 col-md-6">
          <form>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword" placeholder="Subject">
              <label for="floatingPassword">Subject</label>
            </div>
            <div class="form-floating">
              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px"></textarea>
              <label for="floatingTextarea2">Comments</label>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>
<?php
include("footer.php")
?>

</html>