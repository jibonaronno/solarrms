<?php include('header.php');?>
    <div id="templatemo_header_pic">
      <div id="templatemo_slogan">We provide the best quality service for you.</div>
     
    </div>
    
  <div id="templatemo_content">
     <div id="templatemo_top" style="min-height:400px;">
      <h1>MYTRL20 BTS Last Hundred Image</h1>
      <p>
		<style>
			table tr td{padding:5px;}
			.odd{
				background-color:#E1FFFF;
			}
			.even{
				background-color:#C0E3FF;
			}
		</style>
		<div style="width:650px; float:left">
			
			
			<?php
			
			
			$dir = "images2";
			chdir($dir);
			array_multisort(array_map('filemtime', ($files = glob("*.{jpeg,jpg,txt,png,PNG,JPG,JPEG}", GLOB_BRACE))), SORT_DESC, $files);
			//echo '<img src="images2/'.$files["0"].'">';
										
			
										
			//$id = 0;
			echo "<table id='table1' border=\"1\"  style=\"width:100%; border-collapse:collapse\">
										<tr>
											<th>SL</th>
											<th>Images</th>
											<th>Name</th>
										</tr>";
			
			for ($x = 0; $x <= 100; $x++) {
					 
					echo "<TD>";echo $x;echo "</TD>";
					echo "<TD>";
					echo '<img src="images2/'.$files[$x].'"';
					echo "height=\"100\" width=\"200\">";
					echo "</TD>";
					echo "<TD>";echo $files['0'];echo "</TD>";
					echo "</TR>";
					};
			
			echo "</table>";
			
			?>

		</div>

	  </p>
    </div>
    <?php 
  function status_text($value){
	if($value==0)
		return "OFF";
	else
		Return "ON";
  }
  ?>
  </div>
<?php include('footer.php');?>