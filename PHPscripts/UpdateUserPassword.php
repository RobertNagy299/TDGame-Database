<?php
 
 require 'db.php';

 if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['newpassword'])){

    $name = strip_tags($_POST['username']);
    $email = hash('sha256',$_POST['email']);
    $newpass = hash('sha256',$_POST['newpassword']);

    $req = $conn->prepare("SELECT * FROM users WHERE username = '$name' AND email = '$email'");
    $req->execute();

    $r = $req->setFetchMode(PDO::FETCH_ASSOC);
    $result = $req->fetchAll();

    $counter = 0;
    foreach($result as $row){
        $counter++;
    }
    if($counter > 0){

        $req1 = $conn->prepare("UPDATE users SET password_='$newpass' WHERE username = '$name' AND email = '$email'");
        $req1->execute();
        echo "Password successfully updated!";
    }
    else{
        echo "Wrong username or email address!";
    }

 }

?>