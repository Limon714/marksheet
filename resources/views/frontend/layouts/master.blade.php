
@include('frontend.layouts.partials.head')



<!---------------------------- Start headerNavigation ---------------------------->

    @include('frontend.layouts.partials.navbar')

<!---------------------------- End headerNavigation ------------------------------->


@yield('content')


<!-- end wrap -->
@include('frontend.layouts.partials.footer')