@extends('layouts.app')

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

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="name" placeholder="Enter category name">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
