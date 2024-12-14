<?php
try{
    $conn = mysqli_connect('localhost','root','','sms');

    if(!$conn){
        echo "Error:".mysqli_connect_error();
    }
}catch(Exception $e){
    echo $e->getMessage();
}
?>  