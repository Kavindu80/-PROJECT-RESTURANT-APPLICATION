<?php
include("nav.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recipes Finder</title>
</head>



<body>


  <section>
    <div class="container">
      <h2 class="text-center mb-2">Type Any Food and Find Recipes</h2>
      <p class="text-center mb-5">A recipes generating website that uses the TheMealDB API is a website that allows users to generate recipes based on their dietary needs, preferences, and the ingredients they have on hand, using the TheMealDB API.</p>
      <div class="row m-3">
        <div class="col col-12 col-md-6 m-auto d-flex align-items-center">
          <input class="form-control" type="text" placeholder="Type your Food (ex: chicken)" id="search-query" />
          <button class="btn btn-primary mx-2" type="button" id="search-button">Search</button>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 mt-5" id="results">

      </div>
    </div>
  </section>








  <script type="module">
    async function searchMeals(searchQuery) {
      const response = await fetch(`https://www.themealdb.com/api/json/v1/1/search.php?s=${searchQuery}`);

      const data = await response.json();

      if (!Array.isArray(data.meals) || data.meals.length === 0) {
        return [];
      }

      return data.meals;
    }

    document.getElementById('search-button').addEventListener('click', async () => {
      const searchQuery = document.getElementById('search-query').value;

      const meals = await searchMeals(searchQuery);

      const results = document.getElementById('results');
      results.innerHTML = '';

      for (const meal of meals) {
        const result = document.createElement('div');
        result.classList.add('col')
        result.innerHTML = `
        <div class="card mb-3">
          <img src="${meal.strMealThumb}" class="card-img-top" alt="${meal.strMeal}">
          <div class="card-body">
              <h6 class="card-title">${meal.strMeal}</h6>
              <a href="${meal.strYoutube}" class="btn btn-danger p-2"><i class="bi bi-youtube"></i></a>
          </div>
        </div>
    `;

        results.appendChild(result);
        console.log(meal)
      }
    });
  </script>
</body>

</html>
<?php
include("footer.php")
?>