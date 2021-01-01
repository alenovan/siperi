<?php
$banner=$_FILES['fileUpload']['name'];	
$filetype=$_FILES['fileUpload']['type'];
 
//check file type
if($filetype=='application/msword' or $filetype=='text/plain' or $filetype=='application/excel' or $filetype=='text/x-comma-separated-values' or $filetype=='text/comma-separated-values' or $filetype=='application/octet-stream' or $filetype=='application/vnd.ms-excel' or $filetype == 'application/pdf' or $filetype == 'application/x-download')
{
		// Check file size
		if ($_FILES["fileUpload"]["size"] > 3000000) {
			echo "Error : file size should be less than 3MB";
		}else{
			$bannerpath="../../assets/file/upload/".$banner;
			move_uploaded_file($_FILES["fileUpload"]["tmp_name"],$bannerpath);
			echo $banner;		
		}
}else{
	echo "Error : File should be doc, pdf, csv and excel";
}
?>