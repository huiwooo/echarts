<?php
	header("content-Type: text/json; charset=Utf-8"); 
	$connection=new mysqli("127.0.0.1","root","","woolsey98");//连接到数据库
	mysqli_set_charset ($connection,'utf8');
	if(!$connection){
		die("could not connect to the database:</br>".mysqli_connect_error());//诊断连接错误
		exit;
	}
	$cArea = $_POST['data'];
	$query="select * from test where region = '$cArea'";;//构建查询语句
	$result=$connection -> query($query);//执行查询

	$title = array();
	$data = array();
	while($result_row=$result ->fetch_array())//取出结果并显示
	{
		$data = array('value'=>$result_row[4],'name'=>$result_row[2],'level'=>$result_row[1]);
		$title[] = $data;
	}
	print_r(json_encode($title));
	$title = array();
	//echo $title;
	$result->free();
	mysqli_close($connection);//关闭连接
?>