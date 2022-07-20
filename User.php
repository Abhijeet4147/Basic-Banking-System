<?php
 include './header.php' ;
 ?>
<div style="font-family: 'Gabriela', serif;   font-size: 40px;
    text-align: center;
    margin: 30px;
}">Bank's  Customers</div>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Balance</th>
        <th>Gender</th>
        <th>Details</th>
    </tr>


<?php
 include './database.php';
 $query = "SELECT * FROM `users`";
 $result = mysqli_query($conn,$query);
 
$num = mysqli_num_rows($result);

 //Display the rows returns by the sql query
 if($num> 0){
    
    while($row = mysqli_fetch_assoc($result)){

    
    // echo var_dump($row);
    echo "<tr>";
    echo '<form method ="post" action = "Details.php">';
    echo "<td>" . $row["username"] . "</td>
          <td>" . $row["email"] . "</td>
          <td>" . $row["balance"] . "</td>
          <td>" . $row["Gender"] . "</td>";
    echo "<td ><a href='Details.php?user={$row["username"]}&message=no' type='button' name='user'  id='users1' ><span>Expand</span></a></td>";
    echo "</tr>";
    }
 }
 echo "</table>";
 ?>




 
    
</body>
</html>