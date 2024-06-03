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

    <div class="container my-5">
        <div class="row mb-3" >
            <div class="col-6">
                <h2>Category List</h2>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('add-category') }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryCreate">Create Category</a>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td><img width="100" height="100" style="object-fit: cover; border-radius: 50%; " src="{{ asset($category->image) }}" alt=""></td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <button onclick="editCategory({{ $category->id }})" class="btn btn-warning">Edit</button>
                                    <button onclick="deleteModalShow({{ $category->id }})" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



  <!--  Create Modal -->
  <div class="modal fade" id="categoryCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="name">Name</label>
            <input class="form-control" type="text" id="name">
            <br>

            <label for="image">Image</label>
            <div class="thumnail m-3">
                <img class="img-fluid" style="object-fit: cover; border-radius: 50%; " width="100" src="{{ asset('default.png')}}" id="thumnail">
            </div>

            <input oninput="thumnail.src = window.URL.createObjectURL(this.files[0])" class="form-control" type="file" id="image">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="createCategory()" data-bs-dismiss="modal" type="button" class="btn btn-primary">Create Category</button>
        </div>
      </div>
    </div>
  </div>

  {{-- update modal --}}

  <div class="modal fade" id="categoryUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="UpdateModalLabel"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="name">Name</label>
            <input class="form-control" type="text" id="updateName">
            <br>

            <label for="image">Image</label>
            <div class="thumnail m-3">
                <img class="img-fluid" style="object-fit: cover; border-radius: 50%; " width="100" height="100" src="{{ asset('default.png')}}" id="updateimages">
            </div>

            <input oninput="updateimages.src = window.URL.createObjectURL(this.files[0])" class="form-control" type="file" id="updateimage">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="updateId" onclick="updateCategory()" data-bs-dismiss="modal" type="button" class="btn btn-primary">Update Category</button>
        </div>
      </div>
    </div>
  </div>

  {{-- delete modal --}}

  <div class="modal fade" id="categoryDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <button id="deleteId" onclick="deleteModalHide()" data-bs-dismiss="modal" type="button" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>





    <script>

        async function createCategory() {
            let name = document.getElementById('name').value
            let image = document.getElementById('image').files[0]

            let formData = new FormData()
            formData.append('name', name)
            formData.append('image', image)
            formData.append('_token', "{{ csrf_token() }}")

           let res = await axios.post('/add-category', formData)

           if(res.data.success == true) {
               alert(res.data.message)
               location.reload()
           }else {
               alert(res.data.message)
           }
        }

        async function editCategory(id) {
            await showModal();

            let res = await axios.get('/get-category/' + id)

            if(res.data.success == true) {
                document.getElementById('updateName').value = res.data.data.name
                document.getElementById('updateimages').src = res.data.data.image
                document.getElementById('updateId').value = res.data.data.id
                document.getElementById('UpdateModalLabel').innerHTML = res.data.data.name
            }
        }

        async function updateCategory() {

            let name = document.getElementById('updateName').value
            let image = document.getElementById('updateimage').files[0]
            let id = document.getElementById('updateId').value
            let formData = new FormData()
            formData.append('id', id)
            formData.append('name', name)
            formData.append('image', image)
            formData.append('_token', "{{ csrf_token() }}")

           let res = await axios.post('/update-category', formData)

           if(res.data.success == true) {
               alert(res.data.message)
               location.reload()
           }else {
               alert(res.data.message)
           }
        }


        function showModal() {
            $('#categoryUpdate').modal('show')
        }

        function hideModal() {
            $('#categoryUpdate').modal('hide')
        }

        async function deleteModalShow(id) {
            let res = await axios.get('/get-category/' + id)

            if(res.data.success == true) {
                document.getElementById('DeleteName').innerHTML = res.data.data.name
            }

            document.getElementById('deleteId').value = id
            $('#categoryDelete').modal('show')
        }
        async function deleteModalHide() {
            let id = document.getElementById('deleteId').value
            let formData = new FormData()
            formData.append('id', id)
            formData.append('_token', "{{ csrf_token() }}")

            let res = await axios.post('/delete-category',formData)
            if(res.data.success == true) {
                $('#categoryDelete').modal('hide')
                location.reload()
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
