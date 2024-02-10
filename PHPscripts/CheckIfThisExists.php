<?php

require 'db.php';

if(isset($_POST['username']) && isset($_POST['email'])){

    $name = strip_tags($_POST['username']);
    $email = hash('sha256',$_POST['email']);

    $req = $conn->prepare("SELECT * FROM users WHERE email = '$email'");
    $req->execute();

    $r = $req->setFetchMode(PDO::FETCH_ASSOC);
    $result = $req->fetchAll();
    $counter=0;
    foreach($result as $row){
        $counter++;
    }
    if($counter > 0){
        echo "2";
    }
    else{
        
        $req1 = $conn->prepare("SELECT * FROM users WHERE username = '$name'");
        $req1->execute();

        $r1 = $req1->setFetchMode(PDO::FETCH_ASSOC);
        $result1 = $req1->fetchAll();
        $counter1=0;
        foreach($result1 as $row1){
            $counter1++;
        }
        if($counter1 > 0)
        {
            echo "1";
        }
        else{
            echo "3";
        }
    }

}

?>