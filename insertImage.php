<?php
include('functions/config.php');
extract($_GET);
extract($_POST);
if(isset($image)){
	$query=mysqli_query($conn,"INSERT INTO `snapshot`(`image`) VALUES ('$image')");
	if($query){
		$getImage=mysqli_query($conn,"SELECT * FROM `snapshot`");
		$op='';
		while($row=mysqli_fetch_array($getImage)){
			$op.='<img src="'.base64_encode( $row['Image'] ).'"/>';
		}
		echo $op;
	} else {
		echo "INSERT INTO `snapshot`(`image`) VALUES ('$image')";
	}
	// echo $image;
}
?>