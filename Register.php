<?php
  session_start();
  $servername="localhost";
  $username="root";
  $password="";
  $db_data="sbtbsphp";
  $db = mysqli_connect($servername,$username,$password,$db_data);
  $error = ["error"=>""];
  if (!$db) { 
    $_SESSION['message'] = "connection failed";     
    echo "failed";
    header('location: index.php');
    # code...
  }
$firstn = $lastn = $usern =  $regn  =  $passwo = $passwordc ='';
if(isset($_POST['submit'])){
    $firstn = htmlspecialchars($_POST['fname']);
    $email = htmlspecialchars($_POST['email']);
    $reg = htmlspecialchars($_POST['reg']);
    $usern = htmlspecialchars($_POST['uname']);
    $passwo = htmlspecialchars($_POST['psw']);
    $passwordc =htmlspecialchars( $_POST['passco']);
    if($passwo == $passwordc){
    $slq = "INSERT into students(firstname,lastname,registrationno,username,password) values ('$firstn','$email','$reg','$usern','$passwo')";

    $result = mysqli_query($db,$slq);

    if($result){
        header("location:login.php");
    }
    else{
        $error['error'] =  "something went wrong";
    }
}
else{
    $error['password'] = "password didn't match";
}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Regester</title>
	<style>
body {font-family: Arial, Helvetica, sans-serif;
  	background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(food13.jpg);
  	
    background-size: cover;
        background-attachment: fixed;
       background-repeat: no-repet;
       background-position: center center;
}

/* Full-width input fields */
#email{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: green;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button a{
  color:white;
  text-decoration:none;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: green;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}



/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}




/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
#submit{
  background-color: green;
  color: white;
  transition: all .7s ease-in;
}
#submit:hover{
  opacity: 0.8;
}
</style>
</head>
<body>
 <form class="modal-content animate" action="" method="post">
    <div class="imgcontainer">
      
      <img src="food16.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <div class="red-text"><?php echo $error['error']; ?></div>
      <label for=""><b>Full name</b></label>
      <input type="text" placeholder="Enter full name" name="fname" required>
      <label for=""><b>Email</b></label>
      <input type="email" id="email" placeholder="Enter email" name="email" required>
      <label for=""><b>Registration No:</b></label>
      <input type="text" placeholder="Enter registration Number" name="reg" required>
      <label for=""><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <label for=""><b>Confirm Password</b></label>
      <input type="text" placeholder="Enter confirm password" name="passco" required>
      
        
      <button id="submit" type="submit" name="submit">Register</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button"  class="cancelbtn"><a href="login.php">already have an account?</a></button>
     
    </div>
  </form>
</div>

</body>
</html>