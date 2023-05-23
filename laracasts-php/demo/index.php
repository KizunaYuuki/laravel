<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: grid;
            place-content: center;
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <?php
        $name = "Dark Matter";
        $read = false;

        if ($read) {
            $message = "You have read $name";
        } else {
            $message = "You have NOT read $name";
        }
    ?>

    <h1>
        <!-- shortcut echo-->
        <?= $message; ?> 
    </h1>
</body>

</html>