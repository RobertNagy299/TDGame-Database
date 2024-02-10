<?php
  
  require 'db.php';

  if(isset($_POST['username']) && isset($_POST['password_'])){

     $name = strip_tags($_POST['username']);
     $password_ = hash('sha256',$_POST['password_']);

     $req1 = $conn->prepare("SELECT * FROM users WHERE username='$name' AND password_='$password_'");
     $req1->execute();
     $r = $req1->setFetchMode(PDO::FETCH_ASSOC);
     $result1 = $req1->fetchAll();
     $counter = 0;
     foreach($result1 as $row){
        $counter++;
     }
     if($counter > 0){
        $req = $conn->prepare("DELETE FROM users WHERE username='$name' AND password_='$password_'");
        $req->execute();
        
        echo "Account successfully deleted!";
   
     }
     else{
        echo "Wrong username or password!";
     }
    
    
  }

?>