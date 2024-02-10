<?php
require 'db.php';

if(isset($_POST['username']) && isset($_POST['password_']) && isset($_POST['gamedata'])){

    $name = strip_tags($_POST['username']);
    $pass = hash('sha256',$_POST['password_']);

    $gamedt = strip_tags($_POST['gamedata']);

    $req = $conn->prepare("UPDATE users SET gamedata = '$gamedt' WHERE username = '$name' AND password_ = '$pass'");
    $req->execute();

    echo "SUCCESS";
}

?>