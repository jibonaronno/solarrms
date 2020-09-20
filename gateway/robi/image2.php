  <?php
$folder_path = 'images2/'; //image's folder path

$num_files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);

$folder = opendir($folder_path);


if($num_files > 0)
{
 while($file = readdir($folder))
 {
  $file_path = $folder_path.$file;
  $extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
  if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp')
  {
   ?>
            <li><img src="<?php echo $file_path; ?>"/></li></a>
            <?php
  }
 }
}
else
{
 echo "Le dossier est vide !";
}
closedir($folder);
?>