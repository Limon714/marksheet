<!-- resources/views/categories/index.blade.php -->

@extends('../layouts.app')

@section('head')
<style>
    /* Custom styles for viewcategory page*/
    .category-list{
    width: 400px;
    height: auto;
    background-color: #fff;
    box-shadow:0px 0px 5px 1px rgba(235,232,235,1);
}
.category-item, .subcategory-item {
    position: relative;
    font-family: Arial;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    border: none;
}
.arrow {
    float: right;    
    font-size: 20px;
}
.category-item:hover .subcategory-list, .arrow {
    display: block;
}
.category-item:hover {
    color:red;
}
.subcategory-list {
    width: 300px;
    display: none;
    position: absolute;
    left:400px;
    top:0px;
    background-color: #fff;
    box-shadow:0px 0px 5px 1px rgba(235,232,235,1);
    z-index: 1;
}
.subcategory-item:hover .subsubcategory-list {
    display: block;
}
.subcategory-item:hover{
    color:red;
}
.subsubcategory-list {
    width: 300px;
    display: none;
    position: absolute;
    left:300px;
    top:0px;
    background-color: #fff;
    box-shadow:0px 0px 5px 1px rgba(235,232,235,1);
    z-index: 1;
}
.subsubcategory-item{
    font-family: Arial;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    border: none;
}
.subsubcategory-item:hover{
    color:red;
}
</style>
@endsection

@section('content')


<div class="row">
    <div class="col-md-6">
        <h2>Categories</h2>
        <ul class="list-group category-list mt-3">
            @foreach($categories as $category)
            <li class="list-group-item category-item">
                {{ $category->name }}
                @if(count($category->subcategories) > 0)
                <span class="arrow">&rsaquo;</span>
                <ul class="list-group subcategory-list">
                    @foreach($category->subcategories as $subcategory)
                    <li class="list-group-item subcategory-item">
                        {{ $subcategory->name }}
                        @if(count($subcategory->subsubcategories) > 0)
                        <span class="arrow">&rsaquo;</span>
                        <ul class="list-group subsubcategory-list">
                            @foreach($subcategory->subsubcategories as $subsubcategory)
                            <li class="list-group-item subsubcategory-item">
                                {{ $subsubcategory->name }}
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const subcategoryItems = document.querySelectorAll('.subcategory-item');
    subcategoryItems.forEach(subcategoryItem => {
        subcategoryItem.addEventListener('mouseover', function() {
            this.querySelector('.subsubcategory-list').style.display = 'block';
        });
        subcategoryItem.addEventListener('mouseout', function() {
            this.querySelector('.subsubcategory-list').style.display = 'none';
        });
    });
});
</script>

@endsection