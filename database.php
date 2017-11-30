<?php
	$server='localhost';
	$id='root';
	$pwd='1234';
	$dbname='mes_board';   
	$con = mysqli_connect($server , $id , $pwd);
	if (!$con){
  		die("Could not connect: " . mysql_error());
  	}
	mysqli_select_db($con , $dbname);
	mysqli_query($con ,"SET NAMES utf8");
	// mysql_close($con);
?>