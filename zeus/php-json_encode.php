<?php

	$cate = array('china','america','america','janpa');
	
	//排重
	$unique_cate = array_unique($cate);
	
	echo json_encode($unique_cate);
	echo json_encode(array_values($unique_cate));
	
	//最后两条语句数据的数据是不一样，一个是object,一个是array 
?>
