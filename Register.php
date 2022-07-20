
<?php
 include './database.php';
include './header.php' ; 
 if ($_SERVER['REQUEST_METHOD'] =='POST'){
 $name = $_POST['name'];
 $gender = $_POST['gender'];
 $balance=$_POST['balance'];
 $email=$_POST['email'];
 


if(!$conn){
    die("we failed to connect:". mysqli_connect_error());
}

    //sql query to be excute
    //submit these to dataset
 $query = "INSERT INTO users (username, email, balance, gender) VALUES ('$name','$email','$balance','$gender')";
 mysqli_query($conn , $query);

 if($query){
    header("Location: User.php");//for redirec
 }
 else{
    echo "<div class='alert alert-danger alert-dismissible fade show hide' role='alert'>
    <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span class='errorClose' aria-hidden='true'>×</span>
    </button>
    </div>";
 
 }
 }
?>
  

 

  
  

<div class="col-lg-7 text-center py5 container">
                        <h1>Create New User</h1>
                        
                        <form action="./Register.php" method="post">
                            <div class="form-row py-3 pt-5">
                                <div class="offset-1 col-lg-10">
                                    <input type="text" name="name" class="inp px-3" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-row pt-4">
                                <div class="offset-1 col-lg-10">
                                    <input name="email" type="email" class="inp px-3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-row pt-5 ">
                                <div  class="  offset-1 col-lg-10">
                                    <select  name="gender" class="inp px-3 form-selec " aria-label="Default select example">
                                        <option selected>Select Gender</option>
                                        <option value="F">Female</option>
                                        <option value="M">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row pt-5 ">
                                <div class="offset-1 col-lg-10">
                                    <input id="balance" name="balance" type="text" class="inp px-3" placeholder="Balance">
                                </div>
                            </div>
                            <div class="form-row pt-5 pb-5">
                                <div class="offset-1 col-lg-10">
                                    <button type="submit" class="btn1">SUBMIT</BUTTON>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    


    
</body>
</html>