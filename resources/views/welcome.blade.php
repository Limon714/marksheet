@extends('frontend.layouts.master')

@section('title')
    Receoi Manager
@endsection

@section('content')
	<!-- Header -->

	<!-- Navbar -->
	
	<!-- Banner -->
    @include('frontend.layouts.partials.banner')

	  <!--Browse Dish Section-->
	  <section class="relative md:m-10">
		  <div id="search-dish-call" class="font-medium text-2xl md:text-4xl text-center mb-6">Search Your Favorite Dish</div>
		  <div class="bg-white p-3 shadow-sm rounded-sm">
			  <!--Search bar-->
			   <form action="{{ url('/search') }}" method="post" enctype="multipart/form-data">@csrf
			  <div class="border rounded overflow-hidden flex mb-4">
				<input id="home-dish-search-bar" type="text" name="searchRecipe" class="w-11/12 px-4 py-2 border-gray-300 focus:ring-blue-600 font-regular" placeholder="What are you looking for?">
				<div class="input-group-btn search-panel">
					<select class="btn btn-default dropdown-toggle" name="category_id" data-toggle="dropdown">
						<option value="">All</option>
						@foreach ($categories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
				</div>
			
				
				<button type="submit" class="flex w-1/12 items-center justify-center md:px-4 border-l">
				  <svg class="h-4 w-4 text-grey-dark" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"/></svg>
				</button>
				</form>
			  </div>

			  <!--Recent Posts-->
			  <p id="home-no-posts" class="hidden text-center my-4 text-sm che-medium text-gray-400">No Dishes Found</p>
			  <div id="home-posts" class="grid grid-cols-1 md:grid-cols-4 gap-3">
				@foreach ($recipes as $recipe)
			 	<div class="card">
					<img class="card-img-top" src="{{asset("assets/frontend/images/hero-dish.png")}}" alt="Card image cap">
					<div class="card-body">
					<h5 class="card-title">{{$recipe->title}}</h5>
					<p class="card-text">{{ Str::limit($recipe->steps, 100) }}</p>
					<p class="card-text"><small class="text-muted">{{$recipe->created_at}}</small></p>
					</div>
				</div>
				@endforeach
			  </div>
		  </div>
	  </section>
	  <!-- <script type="text/javascript" src="{asset('assets/frontend/scripts/loginHandler.js')}}"></script>
	  <script type="text/javascript" src="{asset('assets/frontend/scripts/homeDishesHandler.js')}}"></script> -->


	  <!-- Footer -->

	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>
	  
@endsection