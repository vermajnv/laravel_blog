@include('layouts.html')
<body>
    <div id="app">
        @include('inc.navbar')
        <main class="container">
            @include('inc.messages')
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{url('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
