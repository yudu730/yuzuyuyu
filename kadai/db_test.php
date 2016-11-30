<?php
	$conn = pg_connect("dbname=yuzuyu user=yuzuyu password=pokemon730 host=localhost");
	if($conn){
		print("成功");
	}else{
		print("失敗");
	}
?>