<?php
    date_default_timezone_set('Asia/Taipei');
    session_set_cookie_params(0,'/','localhost');
    session_start();

    include "./lib/router.php";

    $router = new router();

    echo
    '
        <html>
             <head>
                 <link rel="stylesheet" href="./public/index.css">
                 <link rel="stylesheet" href="./public/client.css">
                 <script type="text/javascript" src="./public/client.js"></script>
                 <script type="text/javascript" src="./public/index.js"></script>
                 <meta charset="UTF-8">
                 <title>demo</title>
             </head>
    ';
    echo $router->get(@$_SERVER['REQUEST_URI']);
    echo ' </html> ';
?>