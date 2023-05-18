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
        <form method="POST" action="/loginhandle" enctype="multipart/form-data">
            @csrf

            <label for="email">email</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="password">password</label><br>
            <input type="text" id="dpassword" name="password"><br>

            <input type="submit" value="Submit">
        </form> 
    </body>
</html>
