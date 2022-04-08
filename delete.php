<?php 

	include 'index.php';
	$model = new Model();
	$sno = $_REQUEST['id'];
	$delete = $model->delete($sno);

	if ($delete) {
		
		echo "<script>window.location.href = 'index.php';</script>";
	}

 ?>