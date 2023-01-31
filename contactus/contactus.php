<?php
$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //selecting database


session_start();

if(isset($_POST['msgbtn']))
{	 
	 $mail = $_POST['emaill'];
     $description = $_POST['desc'];
	 
    
	 $sql = "insert into feedback (csmail,description) values ('$mail','$description')";
    
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}


?>


<html>
    <head>
        <title>hotel|santis</title>
        <link rel="stylesheet" href="contactus.css" >
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
                    
                    <li><a href="//localhost//hotelsantis/facilities/facilities.php#">Facilities</a>  </li>
                    
                    <li><a href="//localhost//hotelsantis/about/about.php#">About US</a>  </li>
                    
                    <li><a href="//localhost//hotelsantis/contactus/contactus.php?#">Feedback</a>  </li>
                
                </ul>
            
            </nav>
        
        </div>
        
        <div class="contactform">
            <h2>Feedback</h2>
            <form method="POST">
                <p> E-mail</p>
                <input type="email" placeholder="Enter Your Mail" name="emaill"><br>
                <p>Description</p>
                <input type="text" placeholder="type your Message" name="desc"><br>
                <input type="submit" value="Let's Talk" name="msgbtn"><br>
              
            
            </form>
        
        </div>
        <div  class="map">
        sssssssssssssssssss
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