<?php

//upload.class

	if(isset($_POST["image"]))
	{
		session_start();
		require'../../class/Fonctions.php';
		require'../../class/Query.php';
		require'../../class/bdd/bdd.php';
		require'../../class/Participant.php';

		$data = $_POST["image"];

		$image_array_1 = explode(";", $data);

		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);

		$name=$_SESSION['user_id_upload'];
		
		$imageName ="../../dist/img/user/participant/".$name.'.png';
		$photo ="../../dist/img/user/participant/".$name.'.png';

		file_put_contents($imageName, $data);
		Participant::upload($name.'.png',$_SESSION['id_user']);

	}

?>




