<?php

    $conn = mysqli_connect('localhost', 'paule', '1234', 'ninja_pizza');

    // check connection
    if(!$conn){
        echo 'Connection error' . mysqli_connect_error();
    }

?>