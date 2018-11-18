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
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- Select Bootstrap-->
        <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
        <link rel="stylesheet" href="{{asset('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css')}}">
        
        <!-- Font Awesome-->
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    </head>
    <body>
        <div id="app">
            
            @include('includes.navbar')
            @include('includes.info')
            @yield('content')
            
            @include('includes.footer')
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        {{-- jquery --}}
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        {{-- select multiple --}}
        <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
        {{-- ck editor --}}
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        @yield('js')
        @yield('ckeditor')
    </body>
</html>