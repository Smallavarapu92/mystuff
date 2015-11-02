<html>
   <head>
      <title>Adding a New Record to homework table in hello_db Database</title>
   </head>
   <body>
   <?php
         if(isset($_POST['enter']))
         {
            $dbhost = 'localhost';
			$dbuser = 'root';
			$dbpass = 'Rugger33!';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn )
            {
               die('Could not connect: ' . mysql_error());
            }
            $entry = $_POST['entry'];    
            $sql = "INSERT INTO homework ". "(entry,join_date) ". "VALUES('$entry',NOW())";
            mysql_select_db('hello_db');
            $retval = mysql_query( $sql, $conn );
            if(! $retval )
            {
               die('Could not enter data: ' . mysql_error());
            }
            echo time();
            echo "Entered data successfully\n";
            
           mysql_close($conn);
         }
         else
         {
            ?>
			<form method="post" action="<?php $_PHP_SELF ?>">
                <table width="400" border="0" cellspacing="1" cellpadding="2">
				<tr>
                    <td width="100">Entry</td>
                    <td><input name="entry" type="text" id="entry"></td>
                </tr>
                  
                <tr>
                    <td width="100"> </td>
                    <td> </td>
                </tr>
                  
                <tr>
                    <td width="100"> </td>
                    <td>
                    <input name="enter" type="submit" id="enter" value="enter">
                    </td>
                </tr>
                </table>
               </form>
            
            <?php
         }
      ?>
   </body>