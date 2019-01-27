<?php
// echo basename($_SERVER['PHP_SELF'],'.php');

//echo $_SERVER['PHP_SELF'];



require_once(dirname(__FILE__).'/../core/class.upload.php');


//require_once(dirname(__FILE__).'/core/class.resize.php');


//echo (dirname(__FILE__).'/core/class.upload.php');

$up = new upload('fileToUpload');

$up->set_directory("../qqq");
 $up->set_filename("rer");

echo $ar = $up->upload()."<br>";

// echo $up->thumbnail();

/*$b = explode('/', $ar);

foreach ($b as $key => $value) {
	if($value ==='..'){ unset($b['0']);}   
}

echo implode('/', $b);*/
// echo  $_FILES["fileToUpload"]["extension"];




/*$resizeObj = new resize('uploads/fanart-wallpaper.jpg'); 
$resizeObj -> resizeImage(150, 100, 'crop'); 
$resizeObj -> saveImage('uploads/sample-resized.gif', 100);*/




?>

<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html> 