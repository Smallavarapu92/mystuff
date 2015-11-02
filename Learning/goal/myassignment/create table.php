<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'Rugger33!';
   //creating a connection
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   //checking if the connection is established
   if(! $conn )
   {
      die('Could not connect: ' . mysql_error());
   }
   echo 'Connected successfully';
   echo '<br>';
   
   $sql = 'CREATE TABLE homework( '.
      'table_id INT NOT NULL AUTO_INCREMENT, '.
      'entry VARCHAR(20) NOT NULL, '.
      'join_date timestamp NOT NULL, '.
      'primary key ( table_id ))';
	
	mysql_select_db('hello_db');
	
	$retval = mysql_query( $sql, $conn );
	
	if(! $retval )
	{
      die('Could not create table: ' . mysql_error());
	}
   	echo "Table homework is created successfully\n";
   	mysql_close($conn);
?>
