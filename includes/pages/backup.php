<p><a href="#">Make a backup of lexpostma.me</a></p>

<?
   
backup_tables(HOST, USER, PASSWORD, DATABASE);


function backup_tables($host,$user,$pass,$name,$tables = '*')
{
	
// 	$link = mysqli_connect($host,$user,$pass);
// 	mysqli_select_db($name,$link);
	global $con;
	
	if($tables == '*')
	{
		$tables = array();
		$result = mysqli_query($con,'SHOW TABLES');
		while($row = mysqli_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	$generationTime = date('Y-m-d H:i:s');
	$generationTimeFilename = date('Y_m_d-H_i');
	$filename = 'lexpostma_me-'.$generationTimeFilename;
	
	$dumpContents = "# ************************************************************
# Lex Postma.me PHP backup script SQL dump
#
# Based on Backup Your MySQL Database Using PHP
# https://davidwalsh.name/backup-mysql-database-php
# Altered according to Sequel Pro layout
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Database: ".$name."
# Generation Time: ".$generationTime."
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;\n\n\n";
	foreach($tables as $table)
	{
		$result = mysqli_query($con,"SELECT * FROM `$table`");
		$num_fields = mysqli_num_fields($result);
		
		$dumpContents.= "# Dump of table $table\n# ------------------------------------------------------------\n\nDROP TABLE IF EXISTS `$table`;";
		$row2 = mysqli_fetch_row(mysqli_query($con,"SHOW CREATE TABLE $table"));
		$dumpContents.= "\n\n".$row2[1].";\n\n";
		$dumpContents.= "LOCK TABLES `$table` WRITE;\n/*!40000 ALTER TABLE `$table` DISABLE KEYS */;\n\nINSERT INTO `$table` (";
		
		$columnnamesQuery = mysqli_query($con,"SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='$name' AND `TABLE_NAME`='$table';");
		$columnnames = "";
		while($row = mysqli_fetch_row($columnnamesQuery))
		{
    		$columnnames.= "`".$row[0]."`, ";
		}
		$dumpContents.= substr($columnnames, 0, -2).")\nVALUES";
		
        $k=0;

		$datatypesQuery = mysqli_query($con,"SELECT `DATA_TYPE` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='$name' AND `TABLE_NAME`='$table';");		
        while($row = mysqli_fetch_array($datatypesQuery)){
            $datatype[] = $row[0];
        }
        
		for ($i = 0; $i < $num_fields; $i++) 
		{
    		
			while($row = mysqli_fetch_row($result))
			{

				if($k==0) { $dumpContents.= "\n	("; $k++; }
				else {      $dumpContents.= ",\n	("; };
				
				for($j=0; $j < $num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = preg_replace('/\n/','\\n',$row[$j]);
                    $row[$j] = preg_replace("/[\n\r]/",'\\r\n',$row[$j]); 


					
					     if (isset($row[$j]) && $row[$j] == NULL) {         $dumpContents.= 'NULL' ;             } 
                    else if (isset($row[$j]) && $datatype[$j] == 'int') {   $dumpContents.= $row[$j];            }
                    else if (isset($row[$j])) {                             $dumpContents.= '\''.$row[$j].'\'' ; }
					else {                                                  $dumpContents.= '\'\'';              };

					if ($j < ($num_fields-1)) { $dumpContents.= ','; }
				}
				$dumpContents.= ")";
			}
		}

		$dumpContents.=";\n\n/*!40000 ALTER TABLE `$table` ENABLE KEYS */;\nUNLOCK TABLES;\n\n\n";
		unset($datatype);
	}
	
	$dumpContents .= "
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";

	
	$handle = fopen('../database_dumps/'.$filename.'--'.(md5(implode(',',$tables))).'.sql','w+');
	fwrite($handle,$dumpContents);
	fclose($handle);
	echo('done');

}
?>
