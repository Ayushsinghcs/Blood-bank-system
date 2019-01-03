
<?php
include("connect.php");

$sql = "select * from donor";
$sql1 = "select * from blood_test";
$sql2 = "select * from staff";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);


    echo "<table class='table table-bordered'>";
    echo "<tr>";
    echo "<th>"; echo "D_ID"; echo "</th>";
    echo "<th>"; echo "DONOR NAME"; echo "</th>";
    echo "<th>"; echo "T_ID"; echo "</th>";
    echo "<th>"; echo "BLOODGROUP"; echo "</th>";
    echo "<th>"; echo "TESTRESULT"; echo "</th>";
    echo "<th>"; echo "QUANTITY"; echo "</th>";
    echo "<th>"; echo "S_ID"; echo "</th>";
    echo "<th>"; echo "STAFF NAME"; echo "</th>";
  echo "</tr>";

        while($row=$result->fetch_array())
    {
        echo "<tr>";

        echo "<td>";echo $row['id'] ;echo  "</td>";
        echo "<td>";echo $row['firstname'].$row['lastname'] ;echo  "</td>";
        echo "</tr>";
    }

while($row1=$result1->fetch_array())
{
echo "<tr>";
  echo "<td>";echo $row1['id'] ;echo  "</td>";
echo "<td>";echo $row1['bloodgroup'] ;echo  "</td>";
echo "<td>";echo $row1['testresult'] ;echo  "</td>";
echo "<td>";echo $row1['quantity'] ;echo  "</td>";
echo "</tr>";
}

while($row2=$result2->fetch_array())
{
echo "<tr>";

echo "<td>";echo $row2['id'] ;echo  "</td>";
echo "<td>";echo $row2['firstname'].$row2['lastname'] ;echo  "</td>";

echo "</tr>";
}
echo "</table>";



?>
