<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <title>Ninja Pizza</title>
    <!-- Materialize framework for css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta charset="UTF-8">
    <style>
        .brand{
            background-color: #cbb09c !important;
        }

        .brand-text{
            color: #cbb09c !important;
        }

        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }

        .pizza{
            width: 100px;
            margin: 20px auto -20px;
            padding-top: 10px;
            display: block;
            position: relative;
        }
    </style>
</head>
    <body class = "grey lighten-4">
        <nav class="white z-depth-0">
            <div class="container">
                <a href="index.php" class="brand-logo brand-text">Ninja Pizza</a>
                <ul id="nav-mobile" class="right hide-on-small-and-down">
                    <?php if(!isset($_SESSION['login'])): ?>
                        <li><a href="login.php" class="btn pink lighten-2 z-depth-0">Log in</a></li>
                        <li><a href="signup.php" class="btn pink lighten-2 z-depth-0">Sign up</a></li>
                    <?php else: ?>
                        <li><a href="logout.php" class="btn pink lighten-2 z-depth-0">Log out</a></li>
                    <?php endif ?>
                    <li><a href="add.php" class="btn brand z-depth-0">Add a Pizza</a></li>
                </ul>
            </div>
        </nav>