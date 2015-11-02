<?php
print_r($_POST);
$command = 'register';

switch($command){
	case 'save': //do something
	   break;
	case 'delete': //do something
	   break;
	case 'register':
	   console.log('Saved');
       $data = print_r($_POST,true);
	   $data = json_encode($_POST);
	   $filename = time().".json";
	   $fp = fopen("./data/{$filename}","w");
	   fwrite($fp,$data);
	   fclose($fp);
	   break;
	default:
	   //do something
}
?>
