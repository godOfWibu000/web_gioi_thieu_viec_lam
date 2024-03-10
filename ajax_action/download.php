<?php
	$nameFile = $_GET['fileName']; // thay đổi tên file từ csdl tại đây
	$FileExtension = explode(".",$nameFile)[count(explode(".",$nameFile))-1];
	$file_url = $_SERVER['DOCUMENT_ROOT'].'/deTaiTTCN_WebViecLamSV/cv/'.$nameFile;
	header('Content-Type: application/octet-stream');
	header("Content-Transfer-Encoding: Binary"); 
	header("Content-disposition: attachment; filename=". $_GET['fileName']); 
	readfile($file_url);
?>