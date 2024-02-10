<?php

require 'db.php';
if(isset($_POST['email'])){

    
    $email = hash('sha256',$_POST['email']);
    $req = $conn->prepare("SELECT username FROM users WHERE email='$email'");
    $req->execute();

    $r = $req->setFetchMode(PDO::FETCH_ASSOC);
    $result = $req->fetchAll();       

    foreach($result as $row){
      echo $row["username"];
    }
}
?>