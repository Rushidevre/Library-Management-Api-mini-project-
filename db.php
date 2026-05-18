<?php
session_start();
$conn=new mysqli("localhost",'root','','lib');
if (! $conn) {
    echo 'not Connected';
}



?>
