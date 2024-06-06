<!-- resources/views/subcategories/edit.blade.php -->

@extends('../layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <h2>Edit SubCategory</h2>
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

    <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $subcategory->name }}">
        </div>
        <div class="form-group mt-2">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-control" id="category_id">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control-file" id="image">
            @if ($subcategory->image)
                <img src="{{ asset('images/' . $subcategory->image) }}" alt="{{ $subcategory->name }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
