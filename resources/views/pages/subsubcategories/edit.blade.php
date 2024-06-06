<!-- resources/views/subcategories/edit.blade.php -->

@extends('../layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <h2>Edit SubSubCategory</h2>
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

    <form action="{{ route('subsubcategories.update', $subsubcategory->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $subsubcategory->name }}">
        </div>
        <div class="form-group mt-2">
            <label for="category_id">SubCategory:</label>
            <select name="sub_category_id" class="form-control" id="sub_category_id">
                <option value="">Select SubCategory</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $subsubcategory->sub_category_id ? 'selected' : '' }}>
                        {{ $subcategory->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control-file" id="image">
            @if ($subsubcategory->image)
                <img src="{{ asset('images/' . $subsubcategory->image) }}" alt="{{ $subsubcategory->name }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-success mt-2">Update</button>
    </form>
@endsection
