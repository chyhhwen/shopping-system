<?php
    date_default_timezone_set('Asia/Taipei');
    session_set_cookie_params(0,'/','localhost');
    session_start();

    require_once("./lib/router.php");
    require_once("./lib/database.php");
    require_once("./lib/http.php");

    $router = new router();
    $sql = new sql();
    $http = new http();

    $sql -> config("root","","shop","list");
    $sql -> put_data(["id","ip","time"]);

    if($sql->check($http->client_ip()))
    {
        http_response_code(404);
        echo $sql->check($http->client_ip());
        echo require "./views/error.php";
        die();
        $txt -> put_test("嘗試進入");
        $txt -> write();
    }
    else
    {
        if(@$_SESSION['index'])
        {
            echo'登入成功';
        }
        else
        {
            if(@$_SERVER['REQUEST_URI'] == '/login' ||
                @$_SERVER['REQUEST_URI'] == '/register' )
            {
                echo
                    '
                    <html>
                    <head>
                        <link rel="stylesheet" href="./public/client.css">
                        <script type="text/javascript" src="./public/client.js"></script>
                        <meta charset="UTF-8">
                        <title>demo</title>
                    </head>
                ';
            }
            else
            {
                echo
                    '
                    <html>
                    <head>
                        <link rel="stylesheet" href="./public/index.css">
                        <script type="text/javascript" src="./public/index.js"></script>
                        <meta charset="UTF-8">
                        <title>demo</title>
                    </head>
                ';
            }
        }
    }
    echo $router->get(@$_SERVER['REQUEST_URI']);
    echo ' </html> ';
?>