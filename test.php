<?php
     include "./lib/database.php";
     $sql = new sql( );
     $sql -> config("root","","shop","user");
     //$sql -> put_data(['','123','alan','123']);
     //$sql -> add("(?,?,?,?)");
     //$sql -> put_data(["id","uid","name","password"]);
     //var_dump($sql -> sel());
     $sql -> del("uid","123");
?>