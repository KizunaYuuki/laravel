<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="antialiased">

        <!-- Product form, with id, description, image -->
        <form method="POST" action="/product" enctype="multipart/form-data">
            @csrf

            <label for="description">Description</label><br>
            <input type="text" id="description" name="description"><br>
            
            <!--  Upload image  -->
            <label for="image">Upload Image</label><br>
            <input type="file" id="image" name="image" accept="image/png, image/jpeg"><br>

            <input type="submit" value="Submit">

        </form> 
        <!-- <img src="{{ asset('images/12.png') }}" alt="description"> -->
        Hello, {{ $paramtranfer }}!
    </body>
</html>
