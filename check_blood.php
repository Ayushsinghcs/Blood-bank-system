<?php


include("connect.php");

    session_start();
    $sql = "select * from blood";
  $result =  $conn->query($sql);


        echo "<table class='table table-bordered'>";
        echo "<tr>";
        echo "<th>"; echo "Blood Group"; echo "</th>";
        echo "<th>"; echo "Total Quantity"; echo "</th>";

         echo "</tr>";

         while($row=$result->fetch_array())
       {
         echo "<tr>";

         echo "<td>";echo $row['bloodgroup'] ;echo  "</td>";
         echo "<td>";echo $row['quantity'] ;echo  "</td>";
         echo "</tr>";
       }
       echo "</table>";
?>
