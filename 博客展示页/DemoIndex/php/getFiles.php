<?php
$dir = "../../"; 
$resArr = list_file($dir);
$len = count($resArr);
$start = $_GET["start"];

$dataArray = array_slice($resArr,$start*6,6);
$data["count"] = $len;
$data["result"] = $dataArray;
$dataJson = json_encode($data);
echo $dataJson;

/**
 * [list_file 遍历文件夹]
 * @param  [string] $dir [文件夹路径]
 * @return [array]      [数组]
 */
function list_file($dir){
	$list = scandir($dir,1); // 得到该文件下的所有文件和文件夹
	foreach($list as $file){//遍历
		$file_location=$dir."/".$file;//生成路径
		if(is_dir($file_location) && $file!="." &&$file!=".." && $file != "DemoIndex"){ //根据路径判断是不是文件夹
			$dataArray[] = $file;
		}
	}
	return $dataArray;
}