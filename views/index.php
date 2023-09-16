<?php

$sql = new sql();

$str = "";
$str = $str ."
    <body>
        <nav>
            <ul>
                <li><a href=/>首頁</a></li>
                <li><a href=/notify>通知</a></li>
                <li><a href=/login>登入</a></li>
                <li><a href=/register>註冊</a></li>
            </ul>
        </nav>
        <div class=container>
            <div class=slide>
                <img src=./img/1.jpg>
            </div>
            <div class=slide>
                <img src=./img/2.jpg>
            </div>
            <div class=slide>
                <img src=./img/3.jpg>
            </div>
        </div>";
$sql -> config("root","","shop","product");
$sql -> put_data(['id','pid','name','img','price','time']);
$data = $sql -> prosel();
$i = 0;
foreach($data as $key => $val)
{
    if($i == 0)
    {
        $str = $str ."<div class =items>";
    }
    $str = $str .
        "
        <article class = item>
            <img src=". $data[$key]['img'] .">
            <span>". $data[$key]['name'] ."</span>
            <span>". $data[$key]['price'] ."</span>
        </article>
    ";
    if($i == 3)
    {
        $i = -1;
        $str = $str ."</div>";
    }
    $i ++;
}
$str = $str ."</body>";
return $str;
?>