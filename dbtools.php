<?php
	function connection(){
		$link = mysqli_connect("localhost","admin","123456")
			or die("error".mysqli_connect_error());

		mysqli_query($link,"set names utf8");

		return $link;
	}

	function execute_sql($link,$database,$sql){
		mysqli_select_db($link,$database)
			or die("error".mysqli_error($link));

		$result = mysqli_query($link,$sql);

		return $result;
	}
?>