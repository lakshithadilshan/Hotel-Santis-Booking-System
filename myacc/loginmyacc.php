<?php
$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //selecting database


session_start();

if(isset($_POST['foodorderbtn'])){
    $foodname= $_POST['food'];
    $rm=$_POST['room'];
    $qtyy=$_POST['qty'];
    
    //validation
    $isValid = true;
    if(  $foodname == '' || $rm == ''  || $qtyy == '' ){
     $isValid = false;
    echo "Please fill all fields.";
     $error_message = "Please fill all fields.";
    
    }if ($isValid && (!preg_match("/^[a-zA-Z-' ]*$/",$foodname))) {
    echo "Enter Correct Food Name";
    $isValid = false;
    }if($isValid &&(!preg_match('@[0-9]@',$rm))) {
    echo "Enter Correct Room Name";
    $isValid = false;
    }if($isValid && ($qtyy==0)){
        echo "Enter at least one quantity";
        $isValid = false;
    }else{
    
    $sql="insert into foodorder(foodName,room,qty) values('$foodname',$rm,$qtyy)";
    
    if(mysqli_query($conn,$sql)){
        echo "++sucess add";
    }else{
        //echo "error".$sql."".mysqli_error($conn);
    }

	      
    }
}




if(isset($_POST['roombookbtn'])){
    
$user = $_POST["roomnumber"];
    
    $isValid = true;
    if($user == !preg_match('@[0-9]@')){
     echo "Enter with room number" ;
        $isValid=false;
    }if($isValid && $user== !preg_match('a-zA-Z')){
      echo "Enter with room number with room keyword " ;  
    }else{

    
 $sql = "update room set status='Reserved' where roomname = '$user'";   
 $result = mysqli_query($conn, $sql);
    

   if(mysqli_query($conn,$sql)){
        echo "    sucess add";
    }else{
        echo "error".$sql."".mysqli_error($conn);
    }

	      
    }
}




mysqli_close($conn);
?>



<html>
<head>
    <title>hotelsantis|myaccount</title>
    <link rel="stylesheet" href="acc.css">
    <style>
    button,.order {
  background-color: #bb00d4; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 10px;
}
        th,td{
            padding: 10;
            font-family:monospace;
            font-weight: 100;
            color: white;
        }

        </style>
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
                    
                    <li><a href="//localhost//hotelsantis/contactus/contactus.php"> Feedback </a>  </li>
                
                </ul>
            
            </nav>
        </div>
        <h1>My Account</h1>
        <div class="mid">
            
            <div class="left">
                <img src="pro.jpg" style="height:120px;margin-left:20px;">
                <br>Username:
                <?php  
              echo $_SESSION["username"]."<br>";
                ?>
                <?php
                if(isset($_POST['logout'])){
                    
                   session_unset();
                   session_destroy(); header("location:".'http://localhost//hotelsantis/index/index.php#');
                }
                ?>
                <form method="POST">
                <input type="submit" value="log out" name="logout" style="
    display: inline-block;
    padding: 12px 36px;
    margin: 10px 0;
    border-radius:40px;
}" class="react">
                </form>
<?php
                
 $conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //selecting database

//$sql = "select * from"
                
                
                
                
                
 //               <p>Username:</p><p class="username"></p>
   //             <p>Name:</p><p class="name"></p>
     //           <p>Gender:</p><p class="gender"></p>
       //         <p>Nic:</p><p class="nic"></p>
         //       <p>Passport:</p><p class="passport"></p>
           //     <p>Country:</p><p class="country"></p>
             //   <p>Reigion:</p><p class="region"></p>
            
            //</div>
            
//?>            
           
        </div>

        <div class="booking">
<center> 
<table border="0">
<tr>
<th>Food ID</th><th>Food Name</th><th>Price</th>
</tr>
<?php
                
     $conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //selecting database
    
    $sql= "select * from foods"; 
    $result = $conn-> query($sql);
    
    if(isset($_POST['food'])){
        
       if($result->num_rows >0){
           while ($row = $result-> fetch_assoc()){
               echo "<tr><td>".$row["foodid"]."</td><td>".$row["foodname"]."</td><td>".$row["price"]."</td></tr>";
           }
       }else{
           echo "No Result";
       }
        
    }  
    
?> 
</table>
</center>
            
            
            
            
            <center>
            <form method="POST">
            <button  name="food" class="button food">Today Food</button>
            <br>
            Food Name<br><input type="text" name="food" placeholder="ex:Pasta">

                <br>Room No:<br><input type="text" name="room" placeholder="ex:1"><br>
                <br>Qty<br><input type="text" name="qty" placeholder="ex:10"><br>
            <input type="submit"  name="foodorderbtn" class="order" Value="Order Now">
                
            
                
            </form>
            </center>
            <br> <br> <br> <br> <br> <br>
            <form method="POST">
            <center>
                <table border="0">
<tr>
<th>Room ID</th><th>Room Name</th><th>Status</th>
</tr>
<?php
                
     $conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //selecting database
    
    $sql= "select * from room"; 
    $result = $conn-> query($sql);
    
    if(isset($_POST['roomsbtn'])){
       if($result->num_rows >0){
           while ($row = $result-> fetch_assoc()){
               echo "<tr><td>".$row["roomid"]."</td><td>".$row["roomname"]."</td><td>".$row["status"]."</td></tr>";
           }
       }else{
           echo "No Result";
       }
        
    }                
?> 
</table>
                
                <button  name="roomsbtn" class="button rooms">Room Availability</button>
            <br>
                
            <input type="text"  name="roomnumber" placeholder="example:room1">
                
                
                <br><input type="submit"  name="roombookbtn" class="order" Value="Book Now">
            </center>
                </form>
            
            
        
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
        </div>
    
    
    </body>
</html>