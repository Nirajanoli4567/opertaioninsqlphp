<?php

include("conn.php");
if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $sql="DELETE FROM NIRAJAN WHERE id=$id";

    $result=mysqli_query($conn,$sql);

    if($result)

    {
        // echo "deleted successfully";

        header('location:display.php');
    }
    else
    {
        echo "sorry cannot delete";
    }
}

?>