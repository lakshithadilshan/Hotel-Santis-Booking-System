<?php

$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //selecting database



if(isset($_POST['submit'])){
    session_start();

    $username=$_POST['username'];
    $password= $_POST['password'];

    //validation
    $isValid = true;
    if( $username == '' || $password == '' ){
     $isValid = false;
    echo "Please fill all fields.";
     
    
   }else{

    $sql = " SELECT * FROM admin WHERE username='$username' AND password='$password' " ;
    
    $res = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($res);
    echo $count;

    if($count== 1){
       
       $_SESSION['adminlogin']=$username; header("location:".'http://localhost//hotelsantis/admin/admin.php');
    }

   else{
        
        header("location:".'http://localhost/hotelsantis/login/login.php');
    }
    }
        

}
    

?>


<html>
    <head>
        <title>hotel|santis</title>
        <link rel="stylesheet" href="adminlog.css" >
        <meta charset="UTF-8">
    
    </head>
    <body>
        
        <div id="main">
            <nav><a href="//localhost//hotelsantis/index/index.php">
                    <img src="Utensils%20Baby%20Food%20Logo%20(3).png" height="90%">
                </a>
                <ul>
                    <li><a href="//localhost//hotelsantis/index/index.php">Home</a>  </li>
                    
                    <li><a href="//localhost//hotelsantis/pic/gallery.php#">Gallery</a>  </li>
                    
                    <li><a href="//localhost//hotelsantis/facilities/facilities.php">Facilities</a>  </li>
                    
                    <li><a href="//localhost//hotelsantis/about/about.php#">About US</a>  </li>
                    
                    <li><a href="//localhost//hotelsantis/contactus/contactus.php?#">Feedback</a>  </li>
                
                </ul>
            
            </nav>
        
        </div>
        
        <div class="contactform">
            <h2>Admin Login</h2>
            <form method="POST" action="#">
                <p> Username</p>
                <input type="text" placeholder="Enter Username" name="username" style="border-radius: 10px;
    padding: 10px;
    margin-bottom: 20px;
    border: none;
    "><br>
                <p>Password</p>
                <input type="password" placeholder="Enter Password" name="password" style="border-radius: 10px;
    padding: 10px;
    margin-bottom: 20px;
    border: none;
    "><br>
                <input type="submit" value="LOGIN" name="submit"><br>
                
            
            </form>
        
        </div>
        <div  class="map">
        
        </div>
        
        <div class="footer">
            <center class="">
               <br><br><br><br><br><b> 
                Hotel Santis<br>Hikkaduwa<br>hotelsantis@yahoo.com
                </b>
                <br>
                <img src="fb.png" height="50px">
                <img src="insta.png" height="50px">
                <img src="twitter.png" height="50px">
            </center>
        
        </div>
    
    
    
    </body>

</html>