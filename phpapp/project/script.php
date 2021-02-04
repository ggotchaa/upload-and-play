<?php

if(isset($_FILES) && !empty($_FILES['video'])) {

	$name = $_FILES['video']['name'];
	move_uploaded_file($_FILES['video']['tmp_name'], './uploads/'.$name);
	echo json_encode(['status'=> 200, 'message'=> $name]);
	exit();
}

?>