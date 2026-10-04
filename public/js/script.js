/*
|--------------------------------------------------------------------------
| SEARCH RECIPE
|--------------------------------------------------------------------------
*/

const searchInput = document.getElementById('searchInput');
const recipeCards = document.querySelectorAll('.recipe-card');
const noResult = document.getElementById('noResult');

if (searchInput) {
    searchInput.addEventListener('input', function () {
        const keyword = this.value.toLowerCase().trim();
        let found = 0;

        recipeCards.forEach(function (card) {
            const name = card.dataset.name;
            if (name.includes(keyword)) {
                card.style.display = 'block';
                found++;
            } else {
                card.style.display = 'none';
            }
        });

        if (found === 0) {
            noResult.style.display = 'block';
        } else {
            noResult.style.display = 'none';
        }
    });
}

/*
|--------------------------------------------------------------------------
| DETAIL RECIPE
|--------------------------------------------------------------------------
*/

function showRecipe(index) {
    const recipe = recipes[index];

    // Ganti gambar asli di modal
    document.getElementById('modalImage').src = recipe.image;
    document.getElementById('modalImage').alt = recipe.name;

    document.getElementById('modalTitle').textContent = recipe.name;
    document.getElementById('modalDescription').textContent = recipe.description;

    /*
    |--------------------------------------------------------------------------
    | BAHAN
    |--------------------------------------------------------------------------
    */
    const ingredients = document.getElementById('modalIngredients');
    ingredients.innerHTML = '';
    recipe.ingredients.forEach(function (ingredient) {
        const li = document.createElement('li');
        li.textContent = ingredient;
        ingredients.appendChild(li);
    });

    /*
    |--------------------------------------------------------------------------
    | ALAT
    |--------------------------------------------------------------------------
    */
    const tools = document.getElementById('modalTools');
    tools.innerHTML = '';
    recipe.tools.forEach(function (tool) {
        const li = document.createElement('li');
        li.textContent = tool;
        tools.appendChild(li);
    });

    /*
    |--------------------------------------------------------------------------
    | TUTORIAL
    |--------------------------------------------------------------------------
    */
    const steps = document.getElementById('modalSteps');
    steps.innerHTML = '';
    recipe.steps.forEach(function (step) {
        const li = document.createElement('li');
        li.textContent = step;
        steps.appendChild(li);
    });

    /*
    |--------------------------------------------------------------------------
    | OPEN MODAL
    |--------------------------------------------------------------------------
    */
    document.getElementById('recipeModal').classList.add('show');
    document.body.style.overflow = 'hidden';
}

/*
|--------------------------------------------------------------------------
| CLOSE MODAL
|--------------------------------------------------------------------------
*/
function closeRecipe() {
    document.getElementById('recipeModal').classList.remove('show');
    document.body.style.overflow = 'auto';
}

/*
|--------------------------------------------------------------------------
| EVENT LISTENERS MODAL
|--------------------------------------------------------------------------
*/
window.addEventListener('click', function (event) {
    const modal = document.getElementById('recipeModal');
    if (event.target === modal) {
        closeRecipe();
    }
});

document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        closeRecipe();
    }
});