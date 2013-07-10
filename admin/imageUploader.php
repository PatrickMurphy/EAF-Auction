<?php 
header('Content-type: application/json');
$path = "uploads/";
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
print_r($_FILES);
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
	$name = $_FILES['photoimg']['name'];
	$size = $_FILES['photoimg']['size'];
	if(strlen($name)){
		list($txt, $ext) = explode(".", $name);
		if(in_array($ext,$valid_formats)){
			if($size<((1024*1024))*5){ // Image size max (1)5 MB
				$actual_image_name = time().$session_id.".".$ext;
				$tmp = $_FILES['photoimg']['tmp_name'];
				if(move_uploaded_file($tmp, $path.$actual_image_name)){
					//mysql_query("UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");
					$data = array('error' => 0, 'filename'=> $actual_image_name, 'size' => $size, 'path' => $path);
				}
				else
				$data = array('error' => 1, 'msg' => 'failed');
				}
			else
			$data = array('error' => 1, 'msg' => 'Image file size max 5 MB'); 
			}
		else
		$data = array('error' => 1, 'msg' => 'Invalid file format');
	}
	else
	$data = array('error' => 1, 'msg' => 'Please Select Image');
	echo(json_encode($data));
	exit;
}
?>