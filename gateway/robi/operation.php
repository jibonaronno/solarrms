<?php include('header.php');?>
    <div id="templatemo_header_pic">
      <div id="templatemo_slogan">We provide the best quality service for you.</div>
     
    </div>
    
  <div id="templatemo_content">
     <div id="templatemo_top" style="min-height:400px;">
      <h1>Operations</h1>
      <p>
	  <?php
		$host       = "localhost";
		/******local********/
		//$dbusername = "ratnai_school";
		$dbusername = "powertec_robi";
		//$dbpassword = "schoo";
		$dbpassword = "2B%w(OyJEJVK";
		//$dbname     = "ratnai_school";
		//
		$dbname     = "powertec_robi";

					 
		$link_id=mysql_connect($host,$dbusername,$dbpassword);

		mysql_select_db($dbname,$link_id);



			$btn1 = $_GET['btn1'];
			$btn2 = $_GET['btn2'];
			$btn3 = $_GET['btn3'];
			$btn4 = $_GET['btn4'];
			$btn5 = $_GET['btn5'];
			$btn6 = $_GET['btn6'];

			if($btn1==1){
				$class1 ="on";
				$status1 = "On";
			}
			else{
				$class1 ="of";
				$status1 = "Off";
			}


			if($btn2==1){
				$class2 ="on";
				$status2 = "On";
			}
			else{
				$class2 ="of";
				$status2 = "Off";
			}
			
			if($btn3==1){
				$class3 ="on";
				$status3 = "On";
			}
			else{
				$class3 ="of";
				$status3 = "Off";
			}
			if($btn4==1){
				$class4 ="on";
				$status4 = "On";
			}
			else{
				$class4 ="of";
				$status4 = "Off";
			}
			if($btn5==1){
				$class5 ="on";
				$status5 = "On";
			}
			else{
				$class5 ="of";
				$status5 = "Off";
			}
			if($btn6==1){
				$class6 ="on";
				$status6 = "On";
			}
			else{
				$class6 ="of";
				$status6 = "Off";
			}
			
			

		 $sql	=	"UPDATE `button_status` SET `btn1` = '$btn1',`btn2` = '$btn2',`btn3` = '$btn3',`btn4` = '$btn4',`btn5` = '$btn5',`btn6` = '$btn6',`create_date` = NOW( ) WHERE `button_status`.`id` =1";

						mysql_query($sql);	
		?>
		<style>
			.on{
					background-color:red;
					display: block;
					width: 110px;
					height: 45px;		
					padding: 1px;
					text-align: center;
					border-radius: 5px;
					color: white;
					font-weight: bold;
					float:left;
					cursor:pointer;
			}
			.of{
					background-color:green;
					display: block;
					width: 110px;
					height: 45px;			
					padding: 1px;
					text-align: center;
					border-radius: 5px;
					color: white;
					font-weight: bold;
					float:left;
					cursor:pointer;
			}
		table tr td{text-align:center;}
		</style>
		<div style="width:650px; float:left">
			<table style="width:100%">
				<tr>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td>4</td>
					<td>5</td>
					<td>6</td>
				</tr>
				<tr>
					<td><button class="<?php echo $class1;?>" onclick="window.location.href='operation.php?btn1=<?php if($btn1==1) echo 0; else echo 1;?>&btn2=<?php echo $btn2?>&btn3=<?php echo $btn3?>&btn4=<?php echo $btn4?>&btn5=<?php echo $btn5?>&btn6=<?php echo $btn6?>'">Door <?php echo $status1;?></button></td>
					<td><button class="<?php echo $class2;?>" onclick="window.location.href='operation.php?btn1=<?php echo $btn1; ?>&btn2=<?php if($btn2==1) echo 0; else echo 1;?>&btn3=<?php echo $btn3?>&btn4=<?php echo $btn4?>&btn5=<?php echo $btn5?>&btn6=<?php echo $btn6?>'">Generator <?php echo $status2;?></button></td>
					<td><button class="<?php echo $class3;?>" onclick="window.location.href='operation.php?btn1=<?php echo $btn1;?>&btn2=<?php echo $btn2?>&btn3=<?php if($btn3==1) echo 0; else echo 1;?>&btn4=<?php echo $btn4?>&btn5=<?php echo $btn5?>&btn6=<?php echo $btn6?>'">Main <?php echo $status3;?></button></td>
					<td><button class="<?php echo $class4;?>" onclick="window.location.href='operation.php?btn1=<?php echo $btn1;?>&btn2=<?php echo $btn2?>&btn3=<?php echo $btn3?>&btn4=<?php if($btn4==1) echo 0; else echo 1;?>&btn5=<?php echo $btn5?>&btn6=<?php echo $btn6?>'">Aviation <?php echo $status4;?></button></td>
					<td><button class="<?php echo $class5;?>" onclick="window.location.href='operation.php?btn1=<?php echo $btn1;?>&btn2=<?php echo $btn2?>&btn3=<?php echo $btn3?>&btn4=<?php echo $btn4?>&btn5=<?php if($btn5==1) echo 0; else echo 1;?>&btn6=<?php echo $btn6?>'">ESC <?php echo $status5;?></button></td>
					<td><button class="<?php echo $class6;?>" onclick="window.location.href='operation.php?btn1=<?php echo $btn1;?>&btn2=<?php echo $btn2?>&btn3=<?php echo $btn3?>&btn4=<?php echo $btn4?>&btn5=<?php echo $btn5?>&btn6=<?php if($btn6==1) echo 0; else echo 1;?>'">Others <?php echo $status6;?></button></td>
				</tr>
			</table>	

		</div>

	  </p>
    </div>
    
  
  </div>
<?php include('footer.php');?>