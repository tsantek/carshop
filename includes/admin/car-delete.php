<?php include "header.php"; ?>

<?php include "navigation.php"; ?>
    
														
<!--PHP -->

<?php
                                                
global $link;
$id = $_GET["id"];


$query = "DELETE FROM cars WHERE id = {$id} LIMIT 1";
$result = mysqli_query($link, $query);

if($result){
	
	$target_dir = "../../public/img-cars/".$id."/";
	$target_dir_img ="../../public/img-cars/".$id."/*";
	$files = glob($target_dir_img); //get all file names
	foreach($files as $file){
    if(is_file($file))
    unlink($file); //delete file
	}
	if(!rmdir($target_dir))
	 {
	 	echo ("Could not remove $target_dir");
	 }

	header("Location: cars.php");

	}else{
		echo "Badd";
	}

?>



                                  

  <?php include "footer.php"; ?>