<?php include('header.php');?>
    <div id="templatemo_header_pic">
      <div id="templatemo_slogan">We provide the best quality service for you.</div>
     
    </div>
    
  <div id="templatemo_content">
     <div id="templatemo_top" style="min-height:400px;">
      <h1>MYTRL20 BTS Last Three Image</h1>
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
			<table border="1"  style="width:100%; border-collapse:collapse">
										<tr>
											<th>SL</th>
											<th>Images</th>
											<th>Name</th>
											
										</tr>

						
										<?php
										$dir = "images2";
										chdir($dir);
										array_multisort(array_map('filemtime', ($files = glob("*.{jpeg,jpg,txt,png,PNG,JPG,JPEG}", GLOB_BRACE))), SORT_DESC, $files);
										  //echo '<img src="images2/'.$files["0"].'">';  
										?>
										
										<tr>
											<td>1</td>
											<td><img src="images2/<?php echo $files['0']; ?>" height="100" width="200"></td>
											<td><?php echo $files['0']; ?> </td>
										  </tr>
										<tr>
											<td>2</td>
											<td><img src="images2/<?php echo $files['1']; ?>" height="100" width="200"></td>
											<td><?php echo $files['1']; ?> </td>
										  </tr>
										<tr>
											<td>3</td>
											<td><img src="images2/<?php echo $files['2']; ?>" height="100" width="200"></td>
											<td><?php echo $files['2']; ?> </td>
										  </tr>

										</table>
						
						</table>	

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