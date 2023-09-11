<?php
include "./lib/database.php";
class router
{
    public function get($url)
    {
        switch($url)
        {
            case '/':
                return require "./views/index.php";
            case '/register':
                return require "./views/register.php";
            case '/register_check':
                $u = @$_POST["user"];
                $p = @$_POST["pass"];
                $sql = new sql( );
                $sql -> config("root","","shop","user");
                $sql -> put_data(['',md5(time()),$u,md5($p)]);
                $sql -> add("(?,?,?,?)");
                header('refresh:0;url="/"');
            break;
            case '/login':
                return require "./views/login.php";
            case '/register_check':
                $u = @$_POST["user"];
                $p = @$_POST["pass"];
                /*$sql = new sql( );
                $sql -> config("root","","shop","user");
                $sql -> put_data(['',md5(time()),$u,md5($p)]);
                $sql -> add("(?,?,?,?)");
                header('refresh:0;url="/"');*/
            default:
                http_response_code(404);
                return require "./views/error.php";
                die();
        }
    }
}
?>