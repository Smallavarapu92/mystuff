<?php
//Step1
 $db = mysql_connect("localhost","root","Rugger33!"); 
 if (!$db) {
 die("Database connection failed miserably: " . mysql_error());
 }
//Step2
 $db_select = mysql_select_db("myDB",$db);
 if (!$db_select) {
 die("Database selection also failed miserably: " . mysql_error());
 }
?>
<html>
 <head>
 <title>Step 5</title>
 </head>
 <body>
 <form method="post" action="<?php $_PHP_SELF ?>">
                  <table width="400" border="0" cellspacing="1" cellpadding="2">
                        <tr>
                        <td width="100">Data </td>
                        <td><input name="data" type="text" id="data"></td>
						</tr>
                  
						<tr>
                        <td width="100"> </td>
                        <td> </td>
						</tr>
                  
                     <tr>
                        <td width="100"> </td>
                        <td>
                           <input name="add" type="submit" id="add" value="Add Record">
                        </td>
                     </tr>
                  
                  </table>
               </form>
<div class="cssstyle">
 <?php
//Step3
//$sql = "INSERT INTO homework ". "(data,reg_date) ". "VALUES("$data", NOW())";

$result = mysql_query("INSERT INTO homework ". "(data,reg_date) ". "VALUES('$data', NOW())", $db);
 if (!$result) {
 die("Database query failed: " . mysql_error());
 }
//Step4
 while ($row = mysql_fetch_array($result)) {
 echo "<h2>";
 echo $row[1]."";
 echo "</h2>";
  echo "<p>";
 echo $row[2]."";
 echo "</p>";
 }
?>
</div>
 </body>
</html>

<?php
//Step5
 mysql_close($db);
?>