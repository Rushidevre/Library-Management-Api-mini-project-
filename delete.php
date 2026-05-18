<?php
include 'db.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql=$conn->prepare('delete from bookrec where bookid=?');
    $sql->bind_param('i',$id);
    if ($sql->execute()) {
        header('location:home.php');
    }
    
}
?>
