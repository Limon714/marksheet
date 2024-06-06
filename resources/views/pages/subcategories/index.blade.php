<!-- resources/views/categories/subcategories.blade.php -->

@extends('../layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2>Subcategories of {{ $category->name }}</h2>
    </div>
    <div class="col-md-6 text-end">
        <a class="btn btn-success" href="{{ route('subcategories.create', ['category_id' => $category->id]) }}">Create New Subcategory</a>
    </div>
</div>

<a class="btn btn-primary mb-3" href="{{ route('categories.index') }}">Back</a>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>            
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subcategories as $subcategory)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $subcategory->name }}</td>            
            <td>
                @if ($subcategory->image)
                <img src="{{ asset('images/' . $subcategory->image) }}" alt="{{ $subcategory->name }}" width="100">
                @endif
            </td>
            <td>
                <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('subcategories.subsubcategories', $subcategory->id) }}">View Details</a>
                    <a class="btn btn-primary" href="{{ route('subcategories.edit', $subcategory->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirmDelete()">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this category?');
}
</script>
@endsection