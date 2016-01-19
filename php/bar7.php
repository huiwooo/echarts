<?php
	header("content-Type: text/json; charset=Utf-8"); 
	$connection=new mysqli("127.0.0.1","root","","woolsey98");//Á¬½Óµ½Êý¾Ý¿â
	mysqli_set_charset ($connection,'utf8');
	if(!$connection){
		die("could not connect to the database:</br>".mysqli_connect_error());//Õï¶ÏÁ¬½Ó´íÎó
		exit;
	}
	$cSubject = $_POST['Subject'];
	$data_middle = array();
	$query_middle="select name,aspect_key from aspect";//¹¹½¨²éÑ¯Óï¾ä
	$result_middle=$connection -> query($query_middle);
	while($result_row_middle=$result_middle ->fetch_array())//È¡³ö½á¹û²¢ÏÔÊ¾
	{
		if($cSubject == $result_row_middle[0]){
			$cSubject = $result_row_middle[1];
			break;
		}
	}
	$query="select industry,$cSubject from test";//¹¹½¨²éÑ¯Óï¾ä

	$result=$connection -> query($query);//Ö´ÐÐ²éÑ¯
	$title = array();
	$data = array();
	while($result_row=$result ->fetch_array())//È¡³ö½á¹û²¢ÏÔÊ¾
	{
		// echo $result_row;
		$data = array('industry'=>$result_row[0],'value'=>$result_row[1]);
		$title[] = $data;
	}
	print_r(json_encode($title));
	$title = array();
	$result->free();
	mysqli_close($connection);//¹Ø±ÕÁ¬½Ó
?>