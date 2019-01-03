<?php


 include("connect.php");

    session_start();
    $sql = "select * from bloodrequest";
    $result=$conn->query($sql);
    echo "<table class='table table-bordered'>";
    echo "<tr>";
    echo "<th>"; echo "ORDERNUM"; echo "</th>";
    echo "<th>"; echo "HOSPITAL_NAME"; echo "</th>";
    echo "<th>"; echo "PATIENT_NAME"; echo "</th>";
    echo "<th>"; echo "BLOODGROUP"; echo "</th>";
    echo "<th>"; echo "QUANTITY"; echo "</th>";
    echo "<th>"; echo "REQUEST DATE"; echo "</th>";

     echo "</tr>";
     while($row=$result->fetch_array())
   {
     echo "<tr>";

     echo "<td>";echo $row['order_no'] ;echo  "</td>";
     echo "<td>";echo $row['hospital_name'] ;echo  "</td>";
     echo "<td>";echo $row['patient_name'] ;echo  "</td>";
     echo "<td>";echo $row['bloodgroup'] ;echo  "</td>";
     echo "<td>";echo $row['quantity'] ;echo  "</td>";
     echo "<td>";echo $row['enter_date'] ;echo  "</td>";

     echo "</tr>";
   }
   echo "</table>";

?>
