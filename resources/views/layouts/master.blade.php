<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'StarWars') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<style>
    #app {
        min-height: 600px;
        background-image: url('/img/background2.jpg');
        background-position: center 10%;
        background-repeat: no-repeat;
        background-color: black;
        color: white;
    }
    .transparent {
        background:rgba(0,0,0,0.9) !important;
        color: white !important;
    }
</style>

<body>
    <div id="app">
        {{--<v-app>
        <app-bar></app-bar>
        @yield('content')
        </v-app>--}}
        {{--@include('includes.header')--}}
        <app-component></app-component>
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>