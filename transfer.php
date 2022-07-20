<?php
    session_start();
 include './database.php';
 include './header.php' ;

 $flag = false;
 if (isset($_POST['transfer']))
 {
    $sender=$_SESSION['username'];
    $receiver=$_POST['reciever'];
    $amount=$_POST['amount'];
 }
    $query = "SELECT balance FROM users WHERE username='$sender'";
    $result = $conn->query($query);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc())
        {
            if ($amount>$row["balance"] or $row["balance"]-$amount<100){
                $location= 'Deatils.php?user='.$sender;
                header("Location: $location&message=transactiondenied");
            }
            else{
                $query = "UPDATE users SET balance=(balance-$amount) WHERE username='$sender'";

                if($conn->query($query)=== TRUE) {
                    $flag=true;
                }
                else{
                    echo "Erroe in updating data:" . $conn->error;
                }
            }
        }
    }else{
        echo "0 results";
    }
    if($flag == true){ 
    $transactioQuery = "INSERT INTO transfer (s_name,r_name,amount) VALUES ('$sender','$receiver','$amount')";
    if ($conn->query($transactioQuery) !== TRUE) {
      echo "Error updating record: " . $conn->error;
      $flag= false;
    }
    }
    
    if($flag==true){
      $location='Details.php?user='.$sender;
      header("Location: $location&message=success");//for redirecting it to detail page with message
    }
    ?>    
 </body>
 </html>