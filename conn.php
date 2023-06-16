<?php
   $servername="localhost";
    $username="root";
    $password="";
    $dbname="d1";

    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
    {
        echo " Database is not connected\n".mysqli_connect_error();
    }
    else 
    {
        // echo " connected successfully"; 
    }

    ?>