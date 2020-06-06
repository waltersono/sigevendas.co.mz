<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/src/vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('src/vendor/dashboard/dashboard.css') }}">

    @yield('styles')
    <style>
      .bd-placeholder-img { 
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }      
    </style>
</head>
<body>
    @auth
        @include('layouts.navbar')
  
        <div class="container-fluid">
            <div class="row">
                @include('layouts.sidebar')
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    @include('partials.alerts')
                    @include('partials.errors')
                    @yield('content')
                </main>
            </div>
        </div>
    @else
        @yield('content')
    @endauth

    <script>window.jQuery || document.write('<script src="src/vendor/jquery/jquery.slim.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="{{ asset('src/vendor/dashboard/dashboard.js') }}"></script>
    <script src="{{ asset('src/vendor/jquery/jquery-3.5.1.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('src/vendor/bootstrap/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('src/vendor/bootstrap/js/bootstrap.js') }}"></script>
    @yield('scripts')
</body>
</html>