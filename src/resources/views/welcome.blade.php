<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                display: flex;
            }
            img {
                width: 100%;
            }
        </style>
    </head>
    <body class="antialiased">
        <?php
            $users = DB::select('select * from users');
            foreach ($users as $user) {
                // echo $user->description;
                $imagePath = $user->description;
                echo    '<div> 
                            <img src="'.$user->imagePath.'">
                            <div>'.$user->description.'</div>
                            <div>'.$user->imagePath.'</div>
                        </div>';
            }         
        ?>
    </body>
</html>
