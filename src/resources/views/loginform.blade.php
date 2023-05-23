<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body class="antialiased">

        <!-- The Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Product form, with id, description, image -->
        <form class="container" method="POST" action="/loginhandle" enctype="multipart/form-data" style="max-width:300px">
            @csrf

            <div class="mb-2">
                <label for="name">Name</label><br>
                <input class="form-control" type="text" id="name" name="name"><br>
            </div>
            <div class="mb-2">
                <label for="email">Email</label><br>
                <input class="form-control" type="text" id="email" name="email"><br>
            </div>
            <div class="mb-2">
                <label for="password">Password</label><br>
                <input class="form-control" type="text" id="dpassword" name="password"><br>
            </div>
            <div class="mb-2">
                <label for="randomnumber">Random Number</label><br>
                <input class="form-control" type="text" id="randomnumber" name="randomnumber"><br>
            </div>
            <div class="mb-2">
                <label for="image">Image Upload</label><br>
                <input class="form-control" type="file" id="image" name="image"><br>
            </div>
            <div class="mb-2">
                <label for="birthdate">Image Upload</label><br>
                <input class="form-control" type="date" id="birthdate" name="birthdate"><br>
            </div>

            <button type="submit" value="Submit" class="btn btn-primary">Submit</button>

        </form> 

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
