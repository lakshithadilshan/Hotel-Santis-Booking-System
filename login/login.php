<?php

$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //selecting database



if(isset($_POST['submit'])){
    session_start();
    

    $username=$_POST['username'];
    $password= $_POST['password'];
    $error_message="empty";
    
    //validation
    $isValid = true;
    if( $username == '' || $password == '' ){
     $isValid = false;
    echo "Enter Username and Password";
     $error_message = "Please fill all fields.";
    
   }if($isValid &&  strlen($password) <= 8 ){
     $isValid = false;
    echo "Your Password incorrect or less than 8 charcters";
     $error_message = "Confirm password not matching";
    }else{
        
 
    
    //login

    $sql = " SELECT * FROM user WHERE username='$username' AND password='$password' " ;
    
    $res = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($res);
    echo $count;

    if($count== 1){
        
       $_SESSION["username"]=$username;
       $_SESSION["passw"]=$password; header("location:".'http://localhost//hotelsantis/myacc/loginmyacc.php');
    }

   else{
        
        header("location:".'http://localhost/hotelsantis/login/login.php');
    }


}
}

?>


<?php
session_start();

$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //dbconnction
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); 

if(isset($_POST['signup'])){
    session_start();
    
$user = $_POST["user"];
$name = $_POST["name"];
$gender = $_POST["gender"];
$nic = $_POST["nic"];
$passport = $_POST["passport"];
$country = $_POST["country"];
$region = $_POST["region"];
$pass = $_POST["pass"];
$confirmpassword=$_POST["cpass"];
    
//validation
    
    //check empty
    $isValid = true;
    if( $user == '' || $name == '' || $gender == ''  || $nic == '' || $passport == '' || $country == '' || $region == '' || $pass == ''){
     $isValid = false;
    echo "Please fill all fields.";
     $error_message = "Please fill all fields.";
    
    //check white space and letter    
   }if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
    echo "Only letters and white space allowed";
    }
    //passowrd less than 8
    // Check if confirm password matching or not
   if(($isValid && ($pass != $confirmpassword))&& strlen($pass) <= 8 ){
     $isValid = false;
    echo "Confirm password not matching OR passowrd less than 8 numbers";
     $error_message = "Confirm password not matching";
   
   }else{    
   
 //register
 $s = "select * from user where username = '$user'";   
 $result = mysqli_query($conn, $s);   
 $num = mysqli_num_rows($result);  
  
if($num == 1){
    echo "Username already exist...";
    
}
    
else{
    $sql = "insert into user values('$user','$name','$gender','$nic','$passport','$country','$region','$pass')";
    
if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
   $_SESSION["user"]=$user;
    $_SESSION["name"]=$name;
    $_SESSION["nic"]=$gender;
    $_SESSION["passport"]=$nic;
    $_SESSION["country"]=$passport;
    $_SESSION["Religious"]=$country;
      header("location:".'http://localhost//hotelsantis/myacc/acc.php#');
	 } else {
		//echo "Error: " . $sql . "" . mysqli_error($conn);
        
	 }
	 mysqli_close($conn);
    
    
   

}
}
}

?>




<!DOCTYPE html>
<html>
<head>
	<title>LOGIN | halidacademy</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="login.css">

	
</head>
<body>
      <div id="main">
            <nav>
                <img src="Utensils%20Baby%20Food%20Logo%20(3).png" height="90%">
                <ul>
                    <li><a href="//localhost//hotelsantis/index/index.php#">Home</a>  </li>
                    
                    <li><a href="//localhost//hotelsantis/pic/gallery.php#">Gallery</a>  </li>
                    
                    <li><a href="//localhost//hotelsantis/facilities/facilities.php">Facilities</a>  </li>
                    
                    <li><a href="//localhost//hotelsantis/about/about.php#">About US</a>  </li>
                    
                    <li><a href="//localhost//hotelsantis/contactus/contactus.php">Feedback </a>  </li>
                
                </ul>
            
            </nav>
        
        </div>
  
	<div class="full">
	<div class="formx">
    <form class="box" action="#" method="POST">
 	<h1>LOGIN</h1><br>
 	<input type="text" name="username" placeholder="username"><br>
 	<input type="password" name="password" placeholder="password" style="border-radius: 10px;
    padding: 10px;
    margin-bottom: 20px;
    border: none;
    border-bottom-color: red;"><br>

 	<input class="subx" type="submit" name="submit" value="login">
 	
        <br><br>
 	 
    </form>
    </div>
     
    <div class="formy">
    <form class="box" action="#" method="POST">
 	<h1>Sign Up</h1><br>
    <input type="text" for="username" name="user" placeholder="Username"><br>
 	<input type="text" for="name" name="name" placeholder="name"><br>
    <input type="text" for="gender" name="gender" placeholder="ex:Male"><br>
    <input type="text" for="nic" name="nic" placeholder="ex:982780489v"><br>
    <input type="text" for="passport" name="passport" placeholder="ex:N78936"><br>
    <input type="text" for="country" name="country" placeholder="ex:Sri Lanka"><br>
    <input type="text" for="reigion" name="region" placeholder="Religion"><br>
 	<input type="password" name="pass" placeholder="Password" class="pass"><br>
        
    <input type="password" name="cpass" placeholder="Re type Password" class="pass"><br>
 	
 	 <input  class="signup" value="Sign Up" type="submit" name="signup">
    </form>
    </div>
    </div>
    
    <div class="footer">
            <center class="">
                
               <br><a href="http://localhost//hotelsantis/admin/adminlog.php"><img src="black.png" height="70"></a><br><br><br><br><b> 
                Hotel Santis<br>Hikkaduwa<br>hotelsantis@yahoo.com
                </b>
                <br>
                <img src="fb.png" height="50px">
                <img src="insta.png" height="50px">
                <img src="twitter.png" height="50px">
                <br>
                
         
                
            </center>
        
        </div>

 



</body>
</html>
   