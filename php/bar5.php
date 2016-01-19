<?php
	header("content-Type: text/json; charset=Utf-8"); 
	$connection=new mysqli("127.0.0.1","root","","woolsey98");//连接到数据库
	mysqli_set_charset ($connection,'utf8');
	if(!$connection){
		die("could not connect to the database:</br>".mysqli_connect_error());//诊断连接错误
		exit;
	}
	$cIndustry = $_POST['Industry'];
	$query="select * from test where industry = '$cIndustry'";//构建查询语句
	$result=$connection -> query($query);//执行查询

	$title = array();
	$data = array();
	while($result_row=$result ->fetch_array())//取出结果并显示
	{
		$data = array($result_row[5],$result_row[6],$result_row[7],$result_row[8],$result_row[9]);
		$data = array('value'=>$data,'name'=>$result_row[0]);
		$title[] = $data;
	}
	print_r(json_encode($title));
	$title = array();
	$result->free();
	mysqli_close($connection);//关闭连接
?>