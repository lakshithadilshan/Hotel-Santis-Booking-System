<?php
$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //selecting database


session_start();

if(isset($_POST['submit'])){	 
	 $news = $_POST['mail'];
    
   //validation
    $isValid = true;
    if( $news == '' ){
     $isValid = false;
    echo "Please Enter Email";
     
    
   }else{
	 
    
	 $sql = "insert into newsletter values('$news')";
    
	 if (mysqli_query($conn, $sql)) {
		#echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
}

?>

<html>
    <head>
        <title>hotel|santis</title>
        <link rel="stylesheet" href="index.css" >
    
    </head>
    <body>
        <div id="main">
            <nav>
                <img src="Utensils%20Baby%20Food%20Logo%20(3).png" height="90%">
                <ul>
                    <li><a href="//localhost//hotelsantis/index/index.php#">Home</a>  </li>
                    
                    <li><a href="//localhost//hotelsantis/pic/gallery.php#">Gallery</a>  </li>
                    
                    <li><a href="//localhost//hotelsantis/facilities/facilities.php#">Facilities</a>  </li>
                    
                    <li><a href="//localhost//hotelsantis/about/about.php#">About US</a>  </li>
                    
                    <li><a href="//localhost//hotelsantis/contactus/contactus.php">Feedback</a>  </li>
                
                </ul>
            
            </nav>
        
        </div>
        <div class="section">
            <video autoplay loo muted>
                <source src="Untitled%20Project%203.mp4" type="video/mp4">
            
            </video>
        <center style="font-family:sans-serif;color:prple;">    
        BoOk Now
        </center>
        </div>
        <div class="logmyacc">
            <center style="font-family:sans-serif">
            <a href="//localhost//hotelsantis/login/login.php"><img src="logbtn.jfif" height="50">
                <img src="signup.png" height="50">
                </a>
            </center>
        </div>
        <div class="welcomee">
            <br><br><br>
        <center style="font-family: monospace;font-size: 50;">    
        Welcome to Hotel Santis
        </center>
        </div>
        <div class="mid">
            <p class="intro">
                <br><br>
            We,Hotel Santis, Filled with hospitality, warmth of the sunny climate and the cool of the sea breeze provide you a very unique experience to your money making your holiday a dreamlike. If you are planning a wedding, a corporate function, a meeting or any other social function, we are equipped to serve you with most elegant and state of the art facilities whilst enhancing your image and desire.
            </p>
            <p class="mid2"><br>Owner Mr.Abeyrathne</p>
        
        </div>
        <div class="newsletters">
            <form method="POST" action="#">
            <center>
                
                Newsletter<br>
                <input type="email" placeholder="lakz@gmail.com" name="mail"><br>
                <input type="submit" value="Subscribe" class="subsc" name="submit">
                
            </center>
            </form>
            </div>
        <div class="footer">
            <center>
               <b>
                <br>
                Hotel Santis<br><br>Hikkaduwa<br><br>hotelsantis@yahoo.com<br><br>+94 912277042
                </b>
                <br>
                <img src="fb.png" height="50px">
                <img src="insta.png" height="50px">
                <img src="twitter.png" height="50px">
            </center>
            
        
        </div>
    
    
    
    </body>

</html>
