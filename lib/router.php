<?php
class router
{
    public function get($url)
    {
        if(@$this->check())
        {
            $temp = str_split($_SERVER['REQUEST_URI'],4);
            $use = "";
            for($i=1;$i<count($temp);$i++)
            {
                $use = $use.$temp[$i];
            }
            switch ($use)
            {
                case '/':
                    http_response_code(404);
                    return require "./views/error.php";
                    die();
                case '/register':
                    //header('Location: http://localhost/');
                    //exit();
                default:
                    http_response_code(404);
                    return require "./views/error.php";
                    die();
            }
        }
        else
        {
            switch($url)
            {
                case '/':
                    return require "./views/index.php";
                case '/defen':
                    include "./defense/login.php";
                    $login = new login();
                    if(@$_POST['user']!=NULL && @$_POST['pass']!=NULL)
                    {
                        if($login ->check(@$_POST['user'],@$_POST['pass']))
                        {
                            $_SESSION['index'] = true;
                        }
                        header('Location: http://localhost/');
                        exit();
                    }
                    else if(@$_POST['name1']!=NULL && @$_POST['user1']!=NULL && @$_POST['pass1']!=NULL)
                    {
                        include "./lib/api.php";
                        $api = new api();
                        $data = [
                            "name" => $_POST['name1'],
                            "user" => $_POST['user1'],
                            "pass" => $_POST['pass1']
                        ];
                        $api -> request('http://localhost/api/menber_add.php',json_encode($data));
                        header('Location: http://localhost/');
                    }
                    else
                    {
                        header('Location: http://localhost/');
                    }
                    break;
                case '/public':
                    http_response_code(404);
                    return require "./views/error.php";
                    die();
                case '/fun':
                    $url = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";
                    echo "<script type='text/javascript'>";
                    echo "window.location.href='$url'";
                    echo "</script>";
                    break;
                case '/youjia':
                    $file = './youjia.jpg';
                    header('Content-Description: File Transfer');
                    header('Content-Type:  image/jpeg.');
                    header('Content-Disposition: attachment; filename='.basename($file));
                    header('Content-Transfer-Encoding: binary');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    ob_clean(); //清除緩存
                    flush();
                    readfile($file);
                    break;
                default:
                    http_response_code(404);
                    return require "./views/error.php";
                    die();
            }
        }

    }
    public function check()
    {
        $temp = str_split($_SERVER['REQUEST_URI'],5);
        if($temp[0] == "/api/")
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>