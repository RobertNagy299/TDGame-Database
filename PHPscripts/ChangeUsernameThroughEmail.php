<?php
 
 require 'db.php';

 if(isset($_POST['email']) && isset($_POST['newname'])){

    $email = hash('sha256',$_POST['email']);
    $newname = strip_tags($_POST['newname']);

    $req = $conn->prepare("SELECT * FROM users WHERE email = '$email'");
    $req->execute();

    $r = $req->setFetchMode(PDO::FETCH_ASSOC);
    $result = $req->fetchAll();

    $counter = 0;
    foreach($result as $row){
        $counter++;
    }
    if($counter > 0){

        $req1 = $conn->prepare("UPDATE users SET username='$newname' WHERE email = '$email'");
        $req1->execute();
        echo "Username successfully updated!";
    }
    else{
        echo "Wrong email address!";
    }

 }

?>