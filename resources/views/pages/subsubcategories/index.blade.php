<!-- resources/views/categories/subcategories.blade.php -->

@extends('../layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2>Subcategories of {{ $subCategory->name }}</h2>
    </div>
    <div class="col-md-6 text-end">
        <a class="btn btn-success" href="{{ route('subsubcategories.create', ['sub_category_id' => $subCategory->id]) }}">Create New SubSubcategory</a>
    </div>
</div>

<a class="btn btn-primary mb-3" href="{{ route('categories.subcategories', $category) }}">Back</a>

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
        @foreach ($subsubcategories as $subsubcategory)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $subsubcategory->name }}</td>            
            <td>
                @if ($subsubcategory->image)
                <img src="{{ asset('images/' . $subsubcategory->image) }}" alt="{{ $subsubcategory->name }}" width="100">
                @endif
            </td>
            <td>
                <form action="{{ route('subsubcategories.destroy', $subsubcategory->id) }}" method="POST">                    
                    <a class="btn btn-primary" href="{{ route('subsubcategories.edit', $subsubcategory->id) }}">Edit</a>
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
