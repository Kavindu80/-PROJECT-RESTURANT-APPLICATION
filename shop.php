<?php
include("nav.php");
include("admin/db/db.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Shop</title>
  <script src="assets/js/shop.js" defer></script>
</head>

<body>

  <section class="products">
    <div class="container">
      <h2 class="text-center mb-2">Our Foods</h2>
      <p class="text-center mb-5">At Food Cabin, we believe that food should be delicious, nutritious, and affordable. That's why we use only the freshest ingredients and prepare each dish with care.</p>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">

        <?php

        $results = $conn->query("SELECT * FROM food_items ORDER BY price ASC");

        // Loop through the results and display them on the web page
        foreach ($results as $row) {
          echo '<div class="col">';
          echo '<div class="card mb-3">';
          echo "<img src='admin/uploads/" . $row["image"] . "' alt='" . $row["title"] . "' />";
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $row["title"] . '</h5>';
          echo '<h6 class="card-title">Price : ' . $row["price"] . "</h6>";
          echo '<p class="card-text">' . $row["description"] . "</p>";
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
</body>
</html>
<?php
include("footer.php")
?>