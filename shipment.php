<?php

include("connect.php");

    session_start();
    $sql = "select * from shipping";
  $result = $conn->query($sql);
  echo "<table class='table table-bordered'>";
  echo "<tr>";
  echo "<th>"; echo "Order No"; echo "</th>";
  echo "<th>"; echo "Staff Id."; echo "</th>";
echo "</tr>";

    while($row= $result->fetch_array())
    {

          echo "<tr>";

          echo "<td>";echo $row['order_no'] ;echo  "</td>";
          echo "<td>";echo $row['staff_id'];echo  "</td>";
          echo "</tr>";
}
    echo "</table>";

?>
