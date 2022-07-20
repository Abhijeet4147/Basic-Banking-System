<?php


 include './header.php';
?>
<table>
    <tr>
    <th>Sender's Name</th>
    <th>Reciever's Name</th>
    <th>Amount</th>
    <th>Date and Time</th>
    </tr>

<?php
include './database.php';

$queryhistory = "SELECT * FROM `transfer`";
$result = mysqli_query($conn,$queryhistory);

$num = mysqli_num_rows($result);

if($num>0){

    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>" . $row["s_name"]. "</td><td>" . $row["r_name"] . "</td><td>" .  $row["amount"] . "</td><td>" . $row["date_time"] . "</td>";
         echo "</tr>";
    
    }
    echo "</table>";
}

?>