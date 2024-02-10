<?php

require 'db.php';

if(isset($_POST['username']) && isset($_POST['password_']) && isset($_POST['email']) && isset($_POST['gamedata'])){

    $req = $conn->prepare("INSERT INTO users(username,password_,email,gamedata) VALUES (:username,:password_,:email,:gamedata)");
    $req->execute(array(
        'username'=>strip_tags($_POST['username']),
        'password_'=>hash('sha256',$_POST['password_']),
        'email'=>hash('sha256',$_POST['email']),
        'gamedata'=>strip_tags($_POST['gamedata'])));
}
?>