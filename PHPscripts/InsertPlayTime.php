<?php

require 'db.php';

if(isset($_POST['username']) && isset($_POST['playtime'])){

    $un = strip_tags($_POST['username']);
    $pt = strip_tags($_POST['playtime']);
    $req = $conn->prepare("UPDATE users SET playtime = $pt WHERE username='$un';");
    $req->execute();
   // $req->execute(array(
    //    'playtime'=>$_POST['playtime']));
    
}

?>