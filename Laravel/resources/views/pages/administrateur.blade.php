
@extends('layouts.app')

<!DOCTYPE html>
 <html>
     <head>
        <title>Admin</title>
    </head>
    <body>
       @include('partials.header')
 
        @yield('content')

        @include('partials.footer')
    </body>
</html>