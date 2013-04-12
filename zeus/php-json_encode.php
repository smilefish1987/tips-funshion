<?php

	$cate = array('china','america','america','japan');
	
	//排重
	$unique_cate = array_unique($cate);
	
	echo json_encode($unique_cate);
	echo json_encode(array_values($unique_cate));
	
	//输出结果如下
	{"0":"china","1":"america","3":"japan"}
	["china","america","japan"]
	
	//一个不规则的数组返回的是object，一个规则的数组返回了array 
	//最后两条语句数据的数据是不一样，一个是object,一个是array
?>
