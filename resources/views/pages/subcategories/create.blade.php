<!-- resources/views/subcategories/create.blade.php -->

@extends('../layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <h2>Create SubCategory</h2>
            <a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('subcategories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="form-group mt-2">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-control" id="category_id">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control-file" id="image">
        </div>
        <button type="submit" class="btn btn-success mt-2">Submit</button>
    </form>
@endsection
