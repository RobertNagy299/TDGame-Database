<?php 

require 'db.php';

if(isset($_POST['content']) && isset($_POST['timedata'])){

    $req = $conn->prepare("INSERT INTO complaints(content, timedata) VALUES (:content,:timedata)");
    $req->execute(array(
        'content'=>$_POST['content'],
        'timedata'=>$_POST['timedata']));
    
}

?>