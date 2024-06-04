<!doctype html>
<html>

<head>
    <!-- ... -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="../styles/main.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js">
    </script>
    <script async src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@16.1.0/dist/lazyload.min.js"></script>


    <style type="text/css">
        .pic_pos {
            float: left;
            height: 400px;
            width: 400px;
            margin-left: 7%;
            margin-top: 5%;

        }

        #recipe_heading {
            -ms-transform: rotate(55deg);
            -ms-transform-origin: 20% 40%;
            transform: rotate(-25deg);
            transform-origin: 90% 65%;
        }

        .content_pos {
            float: right;
            margin-right: 30%;
            margin-top: 5%;

        }

        .background_color_matcher {
            background-color: #fff7d0;
        }

        .ingredients_box {
            margin-top: 5%;
            margin-right: 10%;
            float: right;
            width: 49%;
            height: 300px;
            overflow: scroll;

        }

        .table {
            border-spacing: 0 15px;
        }

        i {
            font-size: 1rem !important;
        }

        .table tr {
            border-radius: 20px;
        }

        tr td:nth-child(n+5),
        tr th:nth-child(n+5) {
            border-radius: 0 .625rem .625rem 0;
        }

        tr td:nth-child(1),
        tr th:nth-child(1) {
            border-radius: .625rem 0 0 .625rem;
        }


        #instruction_table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .instr_table_cont {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>

</head>

<body class="bg-blue-50 overflow-x-hidden">
    <!-- Header Navigation Section -->
    <header>
        <nav class="bg-white shadow-lg fadeInTop">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex justify-between">
                    <div class="flex space-x-7">
                        <div>
                            <!-- Website Logo -->
                            <a href="#" class="flex items-center py-4 px-2">
                                <img src="{{ asset('images/FL_LOGO_FINAL.png') }}" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <!-- Secondary Navbar items -->
                    <div class="hidden md:flex items-center space-x-3 ">
                        <a href="home.html" class="py-4 px-2 text-base font-regular primary-color">Home</a>
                        <a href="contact.php" class="py-4 px-2 text-base font-regular primary-color">Contact Us</a>
                        <a id="nav-profile-img" href="profile.html" class="none md:visible"><img
                                id="nav-profile-img-icon"
                                class="h-9 w-9 rounded-full object-cover items-center justify-content"
                                src='{{ asset('images/default-profile.jpeg') }}' /></a>
                        <a id="nav-login-btn" href="login.html"
                            class="py-2 px-2 text-base font-regular primary-color">Log In</a>
                        <a id="nav-signup-btn" href="signup.html">
                            <button
                                class="bg-blue-600 hover:bg-blue-700 text-white text-base font-regular py-2 px-4 rounded">
                                Sign Up
                            </button>
                        </a>
                    </div>
                    <!-- Mobile menu button -->
                    <div class="md:hidden flex items-center">
                        <button class="outline-none mobile-menu-button">
                            <svg class=" w-6 h-6 text-gray-500 hover:text-blue-600" x-show="!showMenu" fill="none"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- mobile menu -->
            <div class="hidden mobile-menu">
                <ul class="">
                    <li id="nav-profile-img-mobile"><a href="profile.html"
                            class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300 font-regular">Profile</a>
                    </li>
                    <li><a href="home.html" class="block text-sm px-2 py-4 text-white bg-blue-600 font-regular">Home</a>
                    </li>
                    <li><a href="contact.php"
                            class="block text-sm px-2 py-4 hover:bg-blue-600 transition duration-300 font-regular">Contact
                            Us</a></li>
                    <li id="nav-login-btn-mobile"><a href="login.html"
                            class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300 font-regular">Log
                            In</a></li>
                    <li id="nav-signup-btn-mobile"><a href="signup.html"
                            class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300 font-regular">Sign
                            Up</a></li>
                </ul>
            </div>
            <script>
                const btn = document.querySelector("button.mobile-menu-button");
                const menu = document.querySelector(".mobile-menu");

                btn.addEventListener("click", () => {
                    menu.classList.toggle("hidden");
                });
            </script>
        </nav>
    </header>

    <!--Dish Details-->
    <div>
        <div class="flex pt-5 md:pt-12 justify-center">
            <div
                class="bg-white md:h-96 w-11/12 md:w-100 md:mx-8 md:flex md:max-w-5xl shadow-lg rounded-lg justify-between">
                <div
                    class=" rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:rounded-bl-lg md:h-auto overflow-hidden">
                    @foreach ($data as $item)
                        <div>
                            <img id="dish-page-image" class="object-scale-down h-96 w-auto"
                                src='{{ $item->img_url }}' />
                        </div>
                </div>
                <div class="mb-4 pt-5 px-6 max-w-xl md:max-w-5xl md:w-1/2" style="overflow:auto">
                    <h2 id="dish-page-name" class="text-3xl font-medium text-blue-600 mb-3">

                        {{ $item->title }}

                    </h2>
                    <div class="mb-2">
                        <span class="font-medium">Preparation Time:</span>
                        <span id="dish-page-prep-time"
                            class="bg-green-400 text-gray-50 text-sm font-bold rounded-md px-2 py-1">
                            {{ $item->cooking_time }}</span>
                    </div>
                    <div class="mb-5">
                        <span class="font-medium">Cuisine-Type:</span>
                        <span id="dish-page-cuisine-type"
                            class="bg-red-500 text-gray-50 text-sm font-bold rounded-md px-2 py-1">{{ $item->category->name }}</span>
                    </div>
                    <div class="flex items-center">
                        @php
                            $rating = $item->reviews->avg('rating');
                        @endphp

                        <span class="font-medium mr-2">Ratings: </span>
                        <div class="flex">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $rating)
                                    <span>
                                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                    </span>
                                @else
                                    <span class="fa fa-star"></span>
                                @endif
                            @endfor
                        </div>

                    </div>

                    <div class="mt-5">
                        <p class="text-xl text-gray-900 font-bold">Ingredients: </p>
                        <p id="dish-page-ingredients" class="mt-4 text-indigo-600 text-base font-medium">
                            {{ $item->ingredients }}
                        </p>
                    </div>
                    @endforeach
                    <div class="mt-8">
                        <div class="flex flex-row">
                            <span class="font-medium mr-4">Likes: </span>
                            <svg id="dish-page-like-btn" onClick="toggleLikeButton(this)" class="w-6 h-6 cursor-pointer"
                                fill="#FFFFFF" stroke="#EC4899" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                            <span id="dish-page-num-likes" class="ml-2">0</span>
                            <!-- <svg class="w-6 h-6 stroke-current text-pink-500 fill-current text-white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end of ingredients box-->

    <!-- start of dish directions box -->

    <div>
        <div class="py-5 flex justify-center">
            <div class="bg-white w-9/12 md:w-7/10 md:mx-8 md:flex md:max-w-5xl shadow-lg rounded-lg">
                <div class="pt-5 px-6 w-full mb-4">
                    <h2 class="text-2xl font-medium text-blue-600 mb-3">Instructions: <span
                            class="text-indigo-600"></span></h2>

                    <div class="mb-5">
                        <span class="font-medium"> {{ $item->steps }} </span>
                    </div>

                    <div class="mb-3">
                        <span class="bg-green-400 text-gray-50 text-lg font-medium rounded-md px-2 py-1">Nutrition
                            Facts:</span>
                    </div>
                    <div class="p-3 bg-purple-200 rounded-lg text-normal font-medium mb-5">
                        <p>Calories: {{ $item->calories }}</p>
                        <p>Fat: {{ $item->fat }}</p>
                        <p>Protein: {{ $item->protein }}</p>
                        <p>Carbs: {{ $item->carbs }}</p>

                    </div>
                    <span id="dish-page-video-present"
                        class="hidden bg-green-400 text-gray-50 text-sm font-light rounded-md px-2 py-1">Video</span>

                    <div class="text-center font-semibold">
                        <p class="text-base rounded-lg"><span
                                class="text-white bg-purple-600 px-2 py-1 rounded-lg">Recipe by</span></p>
                    </div>

                    <div class="flex flex-row mt-8 justify-center items-center">
                        <div>
                            <img id="dish-page-owner-image"
                                class="w-14 md:w-20 h-14 md:h-20 mr-2 object-cover rounded-full cursor-pointer"
                                src="{{ asset('images/default-profile.jpeg') }}" />
                        </div>
                        <div class=" ml-2">
                            <h2 id="dish-page-owner-name"
                                class="text-gray-800 text-lg font-medium mb-2 cursor-pointer">{{ $item->user->name }}
                            </h2>
                        </div>
                    </div>

                </div>

                <!--Like button-->
            </div>
        </div>
    </div>




    <!--Comments-->
    <div class="py-5 flex justify-center">
        <div class="w-11/12 md:w-7/10 md:mx-8 md:flex md:max-w-5xl shadow-lg rounded-lg">
            <form action="{{ url('/postComment') }}" method="post" class="w-full bg-white rounded-lg px-4 pt-2">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg font-medium">Add a new comment</h2>
                    <div class="w-full md:w-full px-3 mb-2 mt-2">
                        <textarea id="dish-new-comment-text"
                            class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-regular placeholder-gray-700 focus:outline-none focus:bg-white"
                            name="comment" placeholder='Type Your Comment' required></textarea>
                    </div>

                    <div class="px-4 mb-6 flex gap-x-4">
                        <div class="max-w-sm mx-auto">
                            <label for="number-input"
                                class="block mb-2 font-medium text-gray-900 dark:text-white">Rate This Recipe:</label>
                        </div>
                        <div>

                            <input type="number" id="number-input" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="rating" value="1" min="1" max="5" />

                        </div>

                    </div>
                    <div class="w-full md:w-full flex items-start px-3">
                        <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                            <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-xs md:text-sm pt-px">You must be logged in to comment.</p>
                        </div>
                        <div class="-mr-1">
                            <input type='submit'
                                class="bg-blue-600 text-white font-medium py-1 px-4 border rounded-lg tracking-wide mr-1 hover:bg-blue-700 cursor-pointer"
                                value='Post Comment'>
                        </div>
                    </div>
            </form>

            <!--Previously added comments-->
            {{-- <p id="dish-no-comments" class="mx-auto text-center text-sm font-medium text-gray-400 mt-4">No Comments
            </p> --}}
            <div class="mt-8">
                <p class="text-gray-800 text-lg font-medium px-4">All Reviews</p>
            </div>
            <div id="dish-comments" class="w-full px-4 pt-2 pb-2 mt-4">
                <div class="flex flex-row w-full p-2">
                    <div class="ml-2">
                        @foreach ($item->reviews as $item)
                            <div class="flex mb-8">
                                <div class="mr-2">
                                    <img class="w-14 md:w-20 h-14 md:h-20 mr-2 object-cover rounded-full cursor-pointer"
                                        src="{{ asset('images/default-profile.jpeg') }}" />
                                </div>

                                <div>
                                    <div>
                                        <h2 class="text-gray-800 text-lg font-medium mb-1 cursor-pointer">John Doe</h2>
                                    </div>
                                    <div class="flex mb-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $item->rating)
                                                <span>
                                                    <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                </span>
                                            @else
                                                <span class="fa fa-star"></span>
                                            @endif
                                        @endfor
                                    </div>
                                    <div>
                                        <p class="font-regular text-gray-600">
                                            {{ $item->comment }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Foooter -->
    <section class="bg-blue-600">
        <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
            <div class="flex justify-center mt-8 space-x-6">
                <a href="https://www.facebook.com" class="text-gray-50 hover:text-white">
                    <span class="sr-only">Facebook</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="https://twitter.com" class="text-gray-50 hover:text-white">
                    <span class="sr-only">Twitter</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                        </path>
                    </svg>
                </a>
                <a href="https://github.com" class="text-gray-50 hover:text-white">
                    <span class="sr-only">GitHub</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>

            </div>
            <p class="mt-8 text-base leading-6 text-center text-gray-50">
                © 2024 FoodLovers, Inc. All rights reserved.
            </p>

    </section>

    <script type="text/javascript" src='../scripts/loginHandler.js'></script>
    <script type="text/javascript" src='../scripts/dishPageHandler.js'></script>

</body>

</html>
