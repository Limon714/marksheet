<!-- resources/views/categories/edit.blade.php -->

@extends('../layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <h2>Edit Category</h2>
            <a class="btn btn-primary" href="{{ route('categories.index') }}">Back</a>
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

    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}">
        </div>
        <div class="form-group mt-2">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control-file" id="image">
            @if ($category->image)
                <img src="{{ asset('images/' . $category->image) }}" alt="{{ $category->name }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-success mt-2">Update</button>
    </form>
@endsection

