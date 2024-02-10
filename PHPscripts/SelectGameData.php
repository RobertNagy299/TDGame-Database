<?php

require 'db.php';
if(isset($_POST['username']) && isset($_POST['password_'])){

    $name=strip_tags($_POST['username']);
    $password_ = hash('sha256',$_POST['password_']);
    $req = $conn->prepare("SELECT * FROM users WHERE username='$name' AND password_='$password_'");
    $req->execute();

    $r = $req->setFetchMode(PDO::FETCH_ASSOC);
    $result = $req->fetchAll();       

    foreach($result as $row){
      echo $row["gamedata"];
    }
}
?>