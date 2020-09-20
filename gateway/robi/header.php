<?php session_start();
//$domain="http://localhost/robi/";
//$domain="http://nervoustech.com:8090/gateway/robi/";
$domain="http://103.110.113.54:8090/gateway/robi/";
 if(!isset($_SESSION['username'])){?>
<script type="text/javascript">
			window.location = "<?php echo($domain);?>login.php";
		</script>
		
<?php }?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ROBI BTS Automation</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="templatemo_container">
  <div id="templatemo_header">
    <div id="templatemo_site_title">
		<div style="float:left; width:300px;">
			HS Engineering Ltd. 
		</div>
		<div style="float:right; width:200px;">
			<?php
			if (isset($_SESSION['username'])){
			$username = $_SESSION['username'];
			echo "Hi " . $username . "
			";
			echo "<a href='logout.php'>Logout</a>";
			 
			}?>
		</div>
	</div>
    
    <div class="templatemo_menu">
      <ul>
        <li><a href="index.php" class="current">Main Page</a></li>
        <!--<li><a href="operation.php">Operation</a> </li>-->
        <!--<li><a href="sorting.php">LOG</a></li>
        <!-- <li><a href="#">Gift Baskets</a></li>
        <li><a href="#">Delivery</a></li>-->
        <li><a href="#">Contact us</a></li>
      </ul>
    </div>
  </div>