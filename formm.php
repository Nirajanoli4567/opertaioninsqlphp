<?php
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $pass=$_POST['password'];
    $email=$_POST['email'];


    // echo $name."<br>";
    // echo $pass."<br>";
    // echo $email;

    $servername="localhost";
    $username="root";
    $password="";
    $dbname="d1";

    $conn=mysqli_connect($servername,$username,$password,$dbname);

    if(!$conn)
    {
        die ("cannot connect the database").mysqli_connect_error();
    }
    else
    {
        echo " connected successfully" ."<br>";
    }

    $sqlll="INSERT INTO NIRAJAN VALUES ('$name','$pass','$email')";
    if(mysqli_query($conn,$sqlll))
    {
        echo " data inserted";
        // header('location:display.php');
    }
    else{
        echo " daatase are not inserted in the database";
    }
}

?>
