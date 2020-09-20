<?php  //Start the Session
session_start();
include('db.php');
//$domain="http://localhost/robi/";
//$domain="http://nervoustech.com:8090/gateway/robi/";
$domain="http://103.110.113.54:8090/gateway/robi/";
//require('connect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";


$result = mysqli_query( $conn, $query) or die(mysqli_error());
//echo $result;
$count = mysqli_num_rows($result);
//echo $count;
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['username'] = $username;
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
echo "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){?>
<script type="text/javascript">
	window.location = "<?php echo($domain);?>index.php";
</script>
<?php  
}else{
//3.2 When the user visits the page first time, simple login form will be displayed.
?>
<!DOCTYPE html>
 <head>
<title>BTS Automation Logn</title>
</head>
<body>
<style>
.register-form{
	width: 500px;
	margin: 0 auto;
	text-align: center;
	padding: 10px;
	color: #fff;
	background : #c4c4c4;
	border-radius: 10px;
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
}

.register-form form input{padding: 5px;}
.register-form .btn{background: #726E6E;
padding: 7px;
border-radius: 5px;
text-decoration: none;
width: 50px;
display: inline-block;
color: #FFF;}

.register-form .register{
border: 0;
width: 60px;
padding: 8px;
}
</style>
<!-- Form for logging in the users -->

<div class="register-form">
<?php
	if(isset($msg) & !empty($msg)){
		echo $msg;
	}
 ?>
<h1>Login</h1>
<form action="login.php" method="POST">
    <p><label>User Name : </label>
	<input id="username" type="text" name="username" placeholder="username" /></p>
 
     <p><label>Password&nbsp;&nbsp; : </label>
	 <input id="password" type="password" name="password" placeholder="password" /></p>    
    <input class="btn register" type="submit" name="submit" value="Login" />
    </form>
</div>
<?php } ?>
</body>
</html>