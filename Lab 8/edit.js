document.addEventListener("DOMContentLoaded", function () {
  // Predefined recipes
  const predefinedRecipes = [
    {
      id: 1,
      title: "Cupcakes",
      ingredients: "2 cups flour, 1 cup sugar, 1/2 cup butter, 2 eggs, 1 tsp vanilla extract, 1 cup milk",
      instructions: "1. Preheat oven to 350°F (175°C). 2. In a bowl, mix flour and sugar. 3. Add butter and beat until fluffy. 4. Add eggs and vanilla extract, and mix well. 5. Add milk and mix until smooth. 6. Pour batter into cupcake liners. 7. Bake for 20-25 minutes or until a toothpick inserted into the center comes out clean."
    },
    {
      id: 2,
      title: "Pizza",
      ingredients: "1 pizza crust, 1/2 cup tomato sauce, 1 cup mozzarella cheese, toppings of your choice (pepperoni, mushrooms, onions, bell peppers)",
      instructions: "1. Preheat oven to 475°F (245°C). 2. Spread tomato sauce on the pizza crust. 3. Sprinkle mozzarella cheese evenly over the sauce. 4. Add desired toppings. 5. Bake for 10-15 minutes or until the crust is golden brown and the cheese is bubbly."
    }
  ];

  // Save predefined recipes to local storage if not already saved
  if (!localStorage.getItem("recipes")) {
    localStorage.setItem("recipes", JSON.stringify(predefinedRecipes));
  }

  const recipes = JSON.parse(localStorage.getItem("recipes"));

  // Populate the recipes list
  const recipesList = document.getElementById("recipes");
  recipesList.innerHTML = recipes.map(recipe => `<li>${recipe.title}</li>`).join('');

  // Handle ingredient addition
  const ingredientInput = document.getElementById("ingredientInput");
  const addIngredientButton = document.getElementById("addIngredientButton");
  const ingredientsList = document.getElementById("ingredients");

  addIngredientButton.addEventListener("click", function () {
    const ingredient = ingredientInput.value.trim();
    if (ingredient) {
      const li = document.createElement("li");
      li.textContent = ingredient;
      ingredientsList.appendChild(li);
      ingredientInput.value = "";
    }
  });
});
