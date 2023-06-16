<?php
include("conn.php");
$query="SELECT * FROM NIRAJAN";


$dataa=mysqli_query($conn,$query);
$total=mysqli_num_rows($dataa);

// echo $total;

if($total!==0)
{
    ?>

    <table border="4">
      <tr>
        <th>id </th>
        <th>name </th>
        <th>password</th>
        <th>email</th>
        <th>Operation</th>
      </tr>
<?php

    while($result=mysqli_fetch_assoc($dataa))
    {
        echo"
          <tr>
            <td>" .$result['id']."</td>
            <td>" .$result['name']."</td>
            <td>" .$result['password']."</td>
            <td>" .$result['email']."</td>
            <td>
            <button style='background:blue'><a href='update.php?id=$result[id]' style='color:white'>  Ubdate</a></button>
            <button style='background:red'><a href='delete.php?id=$result[id]' style='color:white'>  Delete</a></button>

            </td>
          
          
          
          </tr>


        ";
    }
}

?>


</table>