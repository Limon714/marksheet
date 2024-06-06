<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    {{-- bootstrap cdn --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    {{-- axios --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    {{-- crate recipe modal --}}
     <!--  Create Modal -->
    <div class="modal fade" id="recipeCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Make Recipe</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="title">Title</label>
            <input class="form-control" type="text" id="title">
            <br>

            <label for="ingredients">Ingredients</label>
            <textarea class="form-control" type="text" id="ingredients"></textarea>
            <br>

            <label for="steps">Steps</label>
            <textarea class="form-control" type="text" id="steps"></textarea>
            <br>

            <label for="category">Category</label>
            <select class="form-select" id="category">
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            <br>

            <label for="cooking_time">Cooking Time</label>
            <input class="form-control" type="text" id="cooking_time">
            <br>

            <label for="calories">Calories</label>
            <input class="form-control" type="text" id="calories">
            <br>

            <label for="fat">Fat</label>
            <input class="form-control" type="text" id="fat">
            <br>

            <label for="protein">Protein</label>
            <input class="form-control" type="text" id="protein">
            <br>

            <label for="carbs">Carbs</label>
            <input class="form-control" type="text" id="carbs">
            <br>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="createRecipe()" data-bs-dismiss="modal" type="button" class="btn btn-primary">Make Recipe</button>
        </div>
      </div>
    </div>
    </div>
    {{-- crate recipe modal --}}

    {{-- update recipe modal --}}
    <div class="modal fade" id="recipeUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="updateModalLabel"></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="title">Title</label>
                <input class="form-control" type="text" id="updateTitle">
                <br>

                <label for="ingredients">Ingredients</label>
                <textarea class="form-control" type="text" id="updateIngredients"></textarea>
                <br>

                <label for="steps">Steps</label>
                <textarea class="form-control" type="text" id="updateSteps"></textarea>
                <br>

                <label for="category">Category</label>
                <select class="form-select" id="updateCategory">
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
                <br>

                <label for="cooking_time">Cooking Time</label>
                <input class="form-control" type="text" id="updateCookingTime">
                <br>

                <label for="calories">Calories</label>
                <input class="form-control" type="text" id="updateCalories">
                <br>

                <label for="fat">Fat</label>
                <input class="form-control" type="text" id="updateFat">
                <br>

                <label for="protein">Protein</label>
                <input class="form-control" type="text" id="updateProtein">
                <br>

                <label for="carbs">Carbs</label>
                <input class="form-control" type="text" id="updateCarbs">
                <br>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button id="updateId" onclick="updateRecipe( )" data-bs-dismiss="modal" type="button" class="btn btn-primary">Make Recipe</button>
            </div>
          </div>
        </div>
    </div>
    {{-- update recipe modal --}}

    {{-- view recipe modal --}}
    <div class="modal fade" id="recipeView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="viewTitle"></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <p>Ingredients: <span id="viewIngredients"></span></p>
                <br>

                <p>Steps: <span id="viewSteps"></span></p>
                <br>

                <p>Category: <span id="viewCategory"></span></p>
                <br>

                <p>Cooking Time: <span id="viewCookingTime"></span></p>
                <br>

                <p>Calories: <span id="viewCalories"></span></p>
                <br>

                <p>Fat: <span id="viewFat"></span></p>
                <br>

                <p>Protein: <span id="viewProtein"></span></p>
                <br>

                <p>Carbs: <span id="viewCarbs"></span></p>
                <br>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>
    {{-- view recipe modal --}}

    {{-- delete modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="DeleteName"></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="thumnail m-3 text-center">
                    <img class="img-fluid" style="object-fit: cover; border-radius: 50%; " width="100" height="100" src="{{ asset('delete.jpeg')}}">
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button id="deleteId" onclick="deleteRecipe()" data-bs-dismiss="modal" type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row mb-3" >
            <div class="col-6">
                <h2>Recipe List</h2>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('add-recipe') }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#recipeCreate">Create Recipe</a>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Creator</th>

                            <th>Category</th>
                            <th>Cooking time</th>
                            <th>Calories</th>

                            <th>Carbs</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recipes as $recipe)
                            <tr>
                                <td>{{ $recipe->title }}</td>
                                <td>{{ $recipe->user_id }}</td>

                                <td>{{ $recipe->category_id }}</td>
                                <td>{{ $recipe->cooking_time }}</td>
                                <td>{{ $recipe->calories }}</td>

                                <td>{{ $recipe->carbs }}</td>
                                <td>
                                    <button onclick="viewRecipe({{ $recipe->id }})" class="btn btn-primary mb-2">View</button>
                                    <button onclick="editRecipe({{ $recipe->id }})" class="btn btn-warning mb-2">Edit</button>
                                    <button onclick="deleteModalShow({{ $recipe->id }})" class="btn btn-danger mb-2">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>











    <script>

        async function createRecipe() {
            let title = document.getElementById('title').value;
            let ingredients = document.getElementById('ingredients').value;
            let steps = document.getElementById('steps').value;
            let category_id = document.getElementById('category').value;
            let cooking_time = document.getElementById('cooking_time').value;
            let calories = document.getElementById('calories').value;
            let fat = document.getElementById('fat').value;
            let protein = document.getElementById('protein').value;
            let carbs = document.getElementById('carbs').value;

            let formData = new FormData();
            formData.append('title', title);
            formData.append('ingredients', ingredients);
            formData.append('steps', steps);
            formData.append('category_id', category_id);
            formData.append('cooking_time', cooking_time);
            formData.append('calories', calories);
            formData.append('fat', fat);
            formData.append('protein', protein);
            formData.append('carbs', carbs);
            formData.append('_token', '{{ csrf_token() }}');

            let res = await axios.post('/add-recipe', formData);
            if (res.data.status == '200') {
                alert(res.data.message);
                window.location.reload();
            }else{
                alert(res.data.message);
            }
        }

        async function editRecipe(id) {
            $('#recipeUpdate').modal('show')
            let res = await axios.get('/get-recipe/' + id);
            if (res.data.status == '200') {
                document.getElementById('updateTitle').value = res.data.recipe.title;
                document.getElementById('updateIngredients').value = res.data.recipe.ingredients;
                document.getElementById('updateSteps').value = res.data.recipe.steps;
                document.getElementById('updateCategory').value = res.data.recipe.category_id;
                document.getElementById('updateCookingTime').value = res.data.recipe.cooking_time;
                document.getElementById('updateCalories').value = res.data.recipe.calories;
                document.getElementById('updateFat').value = res.data.recipe.fat;
                document.getElementById('updateProtein').value = res.data.recipe.protein;
                document.getElementById('updateCarbs').value = res.data.recipe.carbs;
                document.getElementById('updateId').value = res.data.recipe.id;
                document.getElementById('updateModalLabel').innerHTML = res.data.recipe.title;
            }else{
                alert(res.data.message);
            }
        }

        // view recipe
        async function viewRecipe(id) {
            let res = await axios.get('/get-recipe/' + id);
            if (res.data.status == '200') {
                document.getElementById('viewTitle').innerHTML = res.data.recipe.title;
                document.getElementById('viewIngredients').innerHTML = res.data.recipe.ingredients;
                document.getElementById('viewSteps').innerHTML = res.data.recipe.steps;
                document.getElementById('viewCategory').innerHTML = res.data.recipe.category_id;
                document.getElementById('viewCookingTime').innerHTML = res.data.recipe.cooking_time;
                document.getElementById('viewCalories').innerHTML = res.data.recipe.calories;
                document.getElementById('viewFat').innerHTML = res.data.recipe.fat;
                document.getElementById('viewProtein').innerHTML = res.data.recipe.protein;
                document.getElementById('viewCarbs').innerHTML = res.data.recipe.carbs;
                $('#recipeView').modal('show')
            }else{
                alert(res.data.message);
            }
        }

        async function updateRecipe() {
            let title = document.getElementById('updateTitle').value;
            let ingredients = document.getElementById('updateIngredients').value;
            let steps = document.getElementById('updateSteps').value;
            let category_id = document.getElementById('updateCategory').value;
            let cooking_time = document.getElementById('updateCookingTime').value;
            let calories = document.getElementById('updateCalories').value;
            let fat = document.getElementById('updateFat').value;
            let protein = document.getElementById('updateProtein').value;
            let carbs = document.getElementById('updateCarbs').value;
            let id = document.getElementById('updateId').value;
            let formData = new FormData();
            formData.append('id', id);
            formData.append('title', title);
            formData.append('ingredients', ingredients);
            formData.append('steps', steps);
            formData.append('category_id', category_id);
            formData.append('cooking_time', cooking_time);
            formData.append('calories', calories);
            formData.append('fat', fat);
            formData.append('protein', protein);
            formData.append('carbs', carbs);
            formData.append('_token', '{{ csrf_token() }}');
            let res = await axios.post('/update-recipe', formData);
            if (res.data.status == '200') {
                alert(res.data.message);
                window.location.reload();
            }else{
                alert(res.data.message);
            }
        }

        async function deleteModalShow(id) {
            let res = await axios.get('/get-recipe/' + id);
            if (res.data.status == '200') {
                document.getElementById('DeleteName').innerHTML = res.data.recipe.title;
            }
            $('#deleteModal').modal('show');
            document.getElementById('deleteId').value = id;
        }

        async function deleteRecipe() {
            let id = document.getElementById('deleteId').value;
            let formData = new FormData();
            formData.append('id', id);
            formData.append('_token', '{{ csrf_token() }}');
            let res = await axios.post('/delete-recipe', formData);
            if (res.data.status == '200') {
                alert(res.data.message);
                window.location.reload();
            }else{
                alert(res.data.message);
            }
        }

    </script>
    {{-- bootstrap cdn js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>

