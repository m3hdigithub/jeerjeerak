<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 | Not Found!</title>
    <style>
        body {
            background: url("<?php echo $baseUrl; ?>/static/images/background.jpg") no-repeat!important;
            background-size: 100%;
        }
        .errorPage{
            background-color: rgba(0, 0, 0, 0.90);
            position: absolute;
            top:0;
            left: 0;
            right: 0;
            bottom: 0;
            color: red;
        }

        .errorPage h1 {
            font-size: 100px;
            text-shadow: 0 0 20px white;
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        .errorPage h3 {
            font-size: 50px;
            text-shadow: 0 0 20px white;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .errorPage a {
            text-decoration: none;
            color: red;
            font-size: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .errorPage a:hover {
            text-shadow: 0 0 30px white;
        }
    </style>
</head>
<body>
<div class="errorPage">
    <h1>Oops...! Error 404</h1>
    <h3>This page not found!</h3>
    <a href="/">return to home page</a>
</div>
</body>
</html>