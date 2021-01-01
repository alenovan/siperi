<?php
$banner=$_FILES['imageFile']['name'];	
$filetype=$_FILES['imageFile']['type'];
 
//check file type
if($filetype=='image/jpeg' or $filetype=='image/png' or $filetype=='image/gif' or $filetype=='image/jpg')
{
		// Check file size
		if ($_FILES["imageFile"]["size"] > 1000000) {
			echo "Error : file size should be less than 1MB";
		}else{
			$bannerpath="../../assets/img/upload/".$banner;
			move_uploaded_file($_FILES["imageFile"]["tmp_name"],$bannerpath);
			echo $banner;		
		}
}else{
	echo "Error : File should be jpg, jpeg, gif and png";
}
?>