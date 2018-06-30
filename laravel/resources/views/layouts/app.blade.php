<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @if (Auth::check())
       <div class="mt-3 mb-3 mr-3 float-right">
            <a href="{{ route('logout') }}" class="approveRequest btn btn-primary btn-xs" 
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="/logoutuser" method="GET" style="display: none;">
                @csrf
            </form>
        </div>

        <div id="app">
            <h1 class="display-4 mb-4 text-center">{{ config('app.name', 'Laravel') }}</h1> 
            @yield('content')        
        </div>
                
    @else
    <div class="container-fluid d-flex align-items-center justify-content-center" style="height: 100vh">
        <div id="app">
            <h1 class="display-4 mb-4 text-center">{{ config('app.name', 'Laravel') }}</h1> 
            @yield('content')        
        </div>
    </div>
    @endif
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	@yield('scripts')
</body>
</html>
