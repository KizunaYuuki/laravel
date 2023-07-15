<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('cdn')
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <title>Laravel</title> -->

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
        <!-- Styles -->
        <style>
            img {
                width: 100%;
            }
        </style>
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand text-danger" href="#">AVALON</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Our Services</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

        <div class="d-flex justify-content-center">
            <?php
                $image = DB::select('select * from image');
                foreach ($image as $item) {
                    // echo $user->description;
                    $imagePath = $item->imagePath;
                    echo    '
                                <div class="card m-2" style="width: 18rem;">
                                    <img src="'.$item->imagePath.'" class="card-img-top" alt="...">
                                    <div class="card-body">'.$item->description.'</div>
                                </div>
                            ';
                }
                $view = "<br/><strong>hello world<strong>";

                use App\Models\User;
                

                DB::insert('insert into users () values ()', []);
                DB::insert('insert into phones (user_id) values (?)', [1]);
                echo User::find(9);

                // $users = DB::select('select * from users');
                // $users = DB::select('select * from users where id >= :id', ['id' >= 0]);
                
                // Insert data into MySQL
                // DB::insert('insert into users (email, password) values (?, ?)', ['Marc2@', 'Secret']);

                // Update data into MySQL
                // $affected = DB::update(
                //     'update users set password = 52542 where email = ?',
                //     ['Marc']
                // );

                // Delete data into MySQL
                // $deleted = DB::delete('delete from users');

                // Drop database
                // DB::statement('drop table users');

                // Running An Unprepared Statement
                // DB::unprepared('update users set password = 1000 where email = "time0009000"');

                // dd($users);
                
                // foreach ($users as $item) {
                //     echo "ID " . "$item->id" . "<br/>";
                // }
            ?>
        </div>
        <div>
            <!-- {{ $view }}
            {!! $view !!}

            @if (false) {
                return 'viewport'
            } -->

            <!-- Comment in Blade Templates  -->
            {{-- This comment will not be present in the rendered HTML --}}
            @endif
        </div>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
<!--
    @verbatim
        <div>view</div>
    @endverbatim
    Hello, @{{ $view }}


        <?php
            $records = -1
        ?>
        @if ($records === 1)
            I have one record!
        @elseif ($records > 1)
            I have multiple records!
        @else
            I don't have any records!
        @endif

        @unless (!true)
            You are not signed in.
        @endunless


        @production
            Production specific content...
        @endproduction

        @for ($i = 0; $i < 10; $i++)
            The current value is {{ $i }} <br>
        @endfor

        <x-todo>
            <x-slot name="title">
                Custom Title
            </x-slot>
            @foreach ($tasks as $task)
                <h3>{{ $task['name'] }}</h3>
            @endforeach
        </x-todo> -->


{{--
        @extends('layouts.app')

        @section('title', 'Page Title')

        @section('sidebar')
            @parent

            <p>This is appended to the master sidebar.</p>
        @endsection

        @section('content')
            <p>This is my body content.</p>
        @endsection
        @push('scripts', '<script>alert("Hello!")</script>')


        @prepend('scripts')<h1>Push & Stack</h1>
            <script>
                alert("Hello again!")
            </script>

        @endprepend --}}

        {{-- HTML form không hỗ trợ method PUT, PATCH, DELETE. Dùng @method('methodName') để dùng PUT, PATCH, DELETE--}}

        {{-- <form action="/foo/bar" method="POST">
            @method('PUT')
            <label for="title">Post Title</label>

            <input id="title" type="text" class="@error('title') is-invalid @enderror">

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}

        </form>
        
        {{--$message = URL::signedRoute('home');--}}
        @php
        $message = URL::temporarySignedRoute('home', now()->addHours(0.5));
        @endphp

        {{ $message }}
        <h1>@datetime(now())</h1>

    </body>
</html>
