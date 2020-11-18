<?php
    $conn = mysqli_connect('localhost', 'sd', 'sd', 'buoi3');
    mysqli_set_charset($conn, "utf8");
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error($conn);
    }
?>