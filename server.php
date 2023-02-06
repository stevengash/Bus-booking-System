
<?php 
	session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$db_data="sbtbsphp";
	$db = mysqli_connect($servername,$username,$password,$db_data);
	if (!$db) { 
	$_SESSION['message'] = "connection failed";     
	echo "failed";
	header('location: pay.html');
	# code...
	}

  
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM ticket WHERE id=$id");
	$_SESSION['message'] = "user number deleted!"; 
	header('location: admins.php');
}
?>