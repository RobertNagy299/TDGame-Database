<?php
 require 'db.php';

 if(isset($_POST['username']) && isset($_POST['email'])){

    $name = strip_tags($_POST['username']);
    $email = hash('sha256',$_POST['email']);

    $req = $conn->prepare("SELECT * FROM users WHERE username = '$name' AND email = '$email'");
    $req->execute();

    $r = $req->setFetchMode(PDO::FETCH_ASSOC);
    $result = $req->fetchAll();

    $counter = 0;
    foreach($result as $row){
        $counter++;
    }
    if($counter > 0){
        echo "1";
    }
    else{
        echo "0";
    }

 }

?>