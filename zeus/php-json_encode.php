<?php

	$cate = array('china','america','america','janpa');
	
	//����
	$unique_cate = array_unique($cate);
	
	echo json_encode($unique_cate);
	echo json_encode(array_values($unique_cate));
	
	//�������������ݵ������ǲ�һ����һ����object,һ����array 
?>
