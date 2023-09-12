<?php
return"
    <body>
        <nav>
            <ul>
                <li><a href=\"/\">首頁</a></li>
                <li><a href=\"/notify\">通知</a></li>
            </ul>
        </nav>
        <div class = view>
        <form action='/login_check' method=POST>
            <div class = item>
                <span>帳號<span>
                <input type = text name=user>
            </div>
            <div class = item>
                <span>密碼<span>
                <input type = password name=pass>
            </div>
            <div class = item>
                <input type = submit value=確認>
            </div>
        </form>
        </div>
    </body>
";
?>