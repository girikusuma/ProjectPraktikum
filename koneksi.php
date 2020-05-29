<?php
    $connection = mysqli_connect("localhost","root","","projectpraktikumweba");
    if(!$connection){
        die("Error".mysqli_connect_error());
    }
?>