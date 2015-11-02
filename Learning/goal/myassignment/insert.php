<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'Rugger33!';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn )
   {
      die('Could not connect: ' . mysql_error());
   }
   else
	   echo 'Connection established <br>';
   
   $sql = 'INSERT INTO homework '.
      '(entry, join_date) '.
      'VALUES ( "second", NOW() )';
	   mysql_select_db('hello_db');
	   
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval )
   {
      die('Could not enter data: ' . mysql_error());
   }
   
   echo "Entered data successfully\n";
   
   mysql_close($conn);
?>