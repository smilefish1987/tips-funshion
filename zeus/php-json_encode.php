<?php

	$cate = array('china','america','america','japan');
	
	//����
	$unique_cate = array_unique($cate);
	
	echo json_encode($unique_cate);
	echo json_encode(array_values($unique_cate));
	
	//����������
	{"0":"china","1":"america","3":"japan"}
	["china","america","japan"]
	
	//һ������������鷵�ص���object��һ����������鷵����array 
	//�������������ݵ������ǲ�һ����һ����object,һ����array
?>
