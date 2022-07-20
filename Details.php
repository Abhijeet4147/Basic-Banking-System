<?php
 include './header.php';
?>
  <table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Balance</th>
    </tr>


    <?php
    session_start();
 include './database.php';
 
 $_SESSION['username'] = $_GET['user'];
 $_SERVER['sender'] = $_SESSION['username'];
?>

<?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query ="SELECT * FROM users WHERE username ='$username' ";
    $result = mysqli_query($conn, $query);

    while ($row =mysqli_fetch_array($result)){
        echo"<tr>";

        echo "<td>" . $row["username"]. "</td><td>". $row["email"] . "</td>
              <td>" . $row["balance"]. "</td><td>". $row["Gender"]."</td>";

        echo"</td>";
    

    }
    

}
?>
<div class ="card container">
<?php
      if ($_GET['message'] == 'success') {
        echo "<h3><p style='color:green;' class='messagehide'>Transaction was successfully</p></h3>";
      }
      if ($_GET['message'] == 'transactionDenied') {
        echo "<h3><p style='color:red;' class='messagehide'>Transaction Failed </p></h3>";
      }
      ?>
     
        <div class='transfer-form'>
        <form action="transfer.php" method="POST">
        <b>To</b>
        <select name="reciever" id="dropdown" class="textbox" required>
          <option>Select Recipient</option>
          <?php
          $db = mysqli_connect("127.0.0.1:3307", "root", "", "banking_system");
          $result = mysqli_query($db, "SELECT * FROM `users` WHERE username!='$username'");
          while ($row = mysqli_fetch_array($result)) {
            echo ("<option> " . "  " . $row['username'] . "</option>");
          }
          ?>
          </select>
          <br><br>
          <b> From </b><span style="font-size:1.2em;"><input id="myinput" name="sender" class="textbox" disabled type="text" value='<?php echo "$username"; ?>'></input></span>
          <b>Amount :&#8377;</b>
        <input name="amount" type="number" min="100" class="textbox" required>
        <br><br>
        <a href="transfer.php"><button id="transfer" name="transfer" ;>Transfer</button></a>
        </form>
        </div>
        <!-- Make Transcation -->   
    </div>

    <div style="font-family: 'Gabriela', serif;   font-size: 40px;
    text-align: center;
    margin: 20px;
}">
      <h3>Customer Details</h3>
    </div>



</body>
</html>