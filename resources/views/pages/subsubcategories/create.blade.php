<!-- resources/views/subcategories/create.blade.php -->

@extends('../layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <h2>Create SubSubCategory</h2>
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

    <form action="{{ route('subsubcategories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="form-group mt-2">
            <label for="category_id">SubCategory:</label>
            <select name="sub_category_id" class="form-control" id="sub_category_id">
                <option value="">Select SubCategory</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
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

