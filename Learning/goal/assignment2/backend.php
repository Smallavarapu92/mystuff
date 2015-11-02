<?php
$command = 'sample';
switch($command){
	case 'save': //do something
	   break;
	case 'delete': //do something
	   break;
	case 'sample':
	   $data = print_r($_POST,true);
	   $data = json_decode($_POST,true);
	   $filename = time().".json";
	   $fp = fopen("./data/{$filename}","w");
	   fwrite($fp,$data);
	   fclose($fp);
	   break;
	default:
	   //do something
}