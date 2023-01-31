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
    if ( preg_match('/\s/',$user) ){
    echo "Enter Room Name Correctly";    
    }else{

    
 $sql = "update room set status='Reserved' where roomname = '$user'";   
 $result = mysqli_query($conn, $sql);
    

   if(mysqli_query($conn,$sql)){
        echo "sucess Booked";
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
    <link rel="stylesheet" href="admin.css">
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
                    
                    <li><a href="//localhost//hotelsantis/contactus/contactus.php">Feedback</a>  </li>
                
                </ul>
            
            </nav>
        </div>
        <h1>Admin Panel</h1>
        <div class="mid">
            
            <div class="left">
                <img src="pro.jpg" style="height:120px;margin-left:20px;">
                <br>Username:
                <?php echo $_SESSION['adminlogin']; ?>
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
<th>Food ID</th><th>Food Name</th><th>Price(LKR)</th>
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
            Food Name<br><input type="text" name="food" placeholder="ex:Psta">

                <br>Room No:<br><input type="text" name="room" placeholder="ex:4"><br>
                <br>Qty<br><input type="text" name="qty" placeholder="ex:10"><br>
            <input type="submit"  name="foodorderbtn" class="order" Value="Order Now">
            </form>
            
            <div class="break">
               break down
                
            </div>
            <form method="POST">
                <br><br><br><br><br><br><br>
             <input type="text" name="orderid" placeholder="ORDER ID"><br>   
            
<table border="0">
<tr>
<th>ORDER ID</th><th>FOOD</th><th>ROOM</th><th>QUANTITY</th>
</tr>
<?php
                
     $conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //selecting database
    
    $sql= "select * from foodorder"; 
    $result = $conn-> query($sql);
    
    if(isset($_POST['showorderbtn'])){
       if($result->num_rows >0){
           while ($row = $result-> fetch_assoc()){
               echo "<tr><td>".$row["orderid"]."</td><td>".$row["foodName"]."</td><td>".$row["room"]."</td><td>".$row["qty"]."</td></tr>";
           }
       }else{
           echo "No Orders";
       }
        
        
    }                
?> 
</table>    <input type="submit"  name="showorderbtn" class="order" Value="Show Orders ">           
            <input type="submit"  name="cancelorderbtn" class="order" Value="Order Cancel"> 
    
    
    
    
<?php
                //cancel Order
$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //selecting database




if(isset($_POST['cancelorderbtn'])){
    $oid= $_POST['orderid'];
    if(!preg_match('@[0-9]@',$oid)) {
    echo "<br>Enter Correct Order id";
    }else{
    $sql="delete from foodorder where orderid='$oid'";
    
    if(mysqli_query($conn,$sql)){
        echo "<br>sucess remove";
    }else{
        echo "error".$sql."".mysqli_error($conn);
    }

	      
    }
}
?>
                
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
            
            
            
<?php
$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //selecting database




if(isset($_POST['fdadd'])){	 
	 $id = $_POST['foodid'];
     $fdname = $_POST['foodname'];
     $price = $_POST['price'];
    
    //validation
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fdname)) {
    echo "Enter Correct Food Name";
    
    }else{
	 
    
	 $sql = "insert into foods (foodid,foodname,price)values ('$id','$fdname',$price)";
    
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
}

?>
            
            
                  <form method="POST" style="background-color:grey;" name="maintainform">
                      
                <center>
                    <br><br><br><br>
                    <p style="color:white;font-family:sans-serif">Food Maintain</p>
                <p> Food ID</p>
                <input type="text" placeholder="Enter Food ID" name="foodid"><br>
                <p>Food Name</p>
                <input type="text" placeholder="Enter Food Name" name="foodname"><br>
                <p>Food Price</p>
                <input type="text" placeholder="Enter Price" name="price"><br>
                <input type="submit" value="ADD FOOD" name="fdadd" class="order">
                <input type="submit" value="UPDATE FOOD" name="updatefoodbtn" class="order">
                <input type="submit" value="REMOVE FOOD" name="removefoodbtn" class="order">
<?php
                
$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //dbconnction
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); 
                
                
if(isset($_POST['updatefoodbtn'])){
    
$fid = $_POST["foodid"];
$fprice = $_POST["price"];
     //validation
    if (!preg_match("@['0-9']@",$fprice)) {
    echo "<br>Enter Correct Food Price Not Changed Price";
    
    }else{

    
 $sql = "update foods set price='$fprice' where foodid = '$fid'";   
 $result = mysqli_query($conn, $sql);
    

   if(mysqli_query($conn,$sql)){
        echo "<br>sucess Changed Price";
    }else{
        echo "error".$sql."".mysqli_error($conn);
    }

	      
    }
}

?>
               
    <br>                   
                        
<?php
$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //selecting database




if(isset($_POST['removefoodbtn'])){
    $fid= $_POST['foodid'];
    
    
    
    $sql="delete from foods where foodid='$fid'";
    
    if(mysqli_query($conn,$sql)){
        echo "<br>sucess remove";
    }else{
        echo "error".$sql."".mysqli_error($conn);
    }

	      
    }
?>         
                   
                    <br><p style="color:white;font-family:sans-serif">Room Maintain</p><br>
            
<?php
$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //selecting database




if(isset($_POST['roomadd'])){	 
	 $id = $_POST['roomid'];
     $rname = $_POST['rmname'];
     $st = $_POST['stat'];
    //validation staus
    if (!preg_match("/^[a-zA-Z-' ]*$/",$st)) {
    echo "status only  can contain letters and spaces";
    
    }else{
    
	 
    
	 $sql = "insert into room values ('$id','$rname','$st')";
    
	 if (mysqli_query($conn, $sql)) {
		echo "<br>Added Room";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
         echo "<br>";
	 }
	 mysqli_close($conn);
}

}
?>
                      
                   
                Room ID<br>
                <input type="text" placeholder="Enter Room ID" name="roomid"><br>
                Room Name<br>
                <input type="text" placeholder="Enter Room Name" name="rmname"><br>
                Status<br>
                <input type="text" placeholder="Enter Status" name="stat"><br>
             
                    <input type="submit" value="ADD ROOM" name="roomadd" class="order">
                        
<?php
$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //selecting database




if(isset($_POST['deleteroom'])){
    $rid= $_POST['roomid'];
    
    
    
    $sql="delete from room where roomid='$rid'";
    
    if(mysqli_query($conn,$sql)){
        echo "<br>sucess remove";
    }else{
        echo "error".$sql."".mysqli_error($conn);
    }

	      
    }
?>
                 <input type="submit" value="DELETE ROOM" name="deleteroom" class="order">
                    
                  
                    
                    
<?php


$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //dbconnction
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //debselct

if(isset($_POST['adduserbtn'])){
    
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
    //Check passowrd less than 8
    // Check if confirm password matching or not
   if(($isValid && ($pass != $confirmpassword))&& strlen($pass) <= 8 ){
     $isValid = false;
    echo "<br>Confirm password not matching OR passowrd less than 8 numbers";
     $error_message = "Confirm password not matching";
   
   }else{
    
 $s = "select * from user where username = '$user'";   
 $result = mysqli_query($conn, $s);   
 $num = mysqli_num_rows($result);  
  
if($num == 1){
    echo '<script>alert("Username already exist...")</script>';
    
    
}
    
else{
    $sql = "insert into user values('$user','$name','$gender','$nic','$passport','$country','$region','$pass')";
    
if (mysqli_query($conn, $sql)) {
        echo "<br>";
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 
    
    
}

}
}

if(isset($_POST['deluserbtn'])){
    $userid=$_POST['user'];
    
    $sql="delete from user where username='$userid'";
    if(mysqli_query($conn,$sql)){
        echo "<br>Sucess Removed";
    }else{
        echo "error".sql."".mysqli_error($conn);
        
    }
}
                    
if(isset($_POST['updateuserbtn'])){
    
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
    //Check passowrd less than 8
    // Check if confirm password matching or not
   if(($isValid && ($pass != $confirmpassword))&& strlen($pass) <= 8 ){
     $isValid = false;
    echo "<br>Confirm password not matching OR passowrd less than 8 numbers";
     $error_message = "Confirm password not matching";
   
   }else{
    
    
$sql="update  user set Name='$name',gender='$gender',nic='$nic',passport='$passport',country='$country',reigion='$region',password=$pass where username='$user'";
if(mysqli_query($conn,$sql)){
    echo"<br>Updated";
}else{
    echo "error".sql."".mysqli_error($conn);
    
}
    
}
}
  
    

mysqli_close($conn);
?>

    
<br><p style="color:white;font-family:sans-serif"><br>USER Maintain</p><br>
<table border="1">
<tr><th>USERNAME</th><th>NAME</th><th>GENDER</th><th>NIC</th><th>PASSPORT</th><th>COUNTRY</th><th>RELIGION</th><th>PASSWORD</th></tr>                    
<?php
$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //dbconnction
$db_select = mysqli_select_db($conn,'hotelsantis') or die(mysqli_error()); //debselct    
    
           

    $sql="select * from user";     
    $result=$conn-> query($sql);
    
if(isset($_POST['showuserbtn'])){
    
    if($result->num_rows>0){
        while ($row = $result-> fetch_assoc()){
            echo "<tr><td>".$row["username"]."</td><td>".$row["Name"]."</td><td>".$row["gender"]."</td><td>".$row["nic"]."</td><td>".$row["passport"]."</td><td>".$row["country"]."</td><td>".$row['reigion']."</td><td>".$row["password"]."</td></tr>";
        }
    }
    
    
}
                    
                    
                    
                   
 mysqli_close($conn);                   
?>
 </table>                    
                    
                    
      USERNAME    <br>          
    <input type="text" for="username" name="user" placeholder="Username"><br>
      Name<br>
 	<input type="text" for="name" name="name" placeholder="name"><br>
     Gender<br>
    <input type="text" for="gender" name="gender" placeholder="gender"><br>
     NIC<br>
    <input type="text" for="nic" name="nic" placeholder="nic"><br>
     Passport<br>
    <input type="text" for="passport" name="passport" placeholder="passport"><br>
     Country<br>
    <input type="text" for="country" name="country" placeholder="country"><br>
     Reigion<br>
    <input type="text" for="reigion" name="region" placeholder="reigion"><br>
     Password<br>
 	<input type="password" name="pass" placeholder="Password" class="pass"><br>
     Confirm Password <br>
    <input type="password" name="cpass" placeholder="Re type Password" class="pass"><br>
                    
                    
    <br>
                <input type="submit" value="ADD USER" name="adduserbtn" class="order">
                <input type="submit" value="DELETE USER" name="deluserbtn" class="order">
                <input type="submit" value="UPDATE USER" name="updateuserbtn" class="order">
                <input type="submit" value="ALL USERS" name="showuserbtn" class="order">
            </center>
            </form>
     
        </div>
         
            
            <form name="chat" method="post">
            <br><br>
            <input type="submit"  name="chatbtn" class="order" Value="Feedback">
            
            
            </form>
        
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