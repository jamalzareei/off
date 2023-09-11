<?php
include 'PHPMailerAutoload.php';
/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*',$email=null,$charset=null){
	$link = mysqli_connect($host,$user,$pass,$name);
	if(!$link){
		die;//connection error
	}
	if(!empty($charset)){
		@mysqli_set_charset($link,'utf8');
	}
	//get all of the tables
	if($tables == '*'){
		$tables = array();
		$result = mysqli_query($link,'SHOW TABLES');
		while($row = mysqli_fetch_row($result)){
			$tables[] = $row[0];
		}
	}else{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//cycle through
	$return='';
	foreach($tables as $table){
		$result = mysqli_query($link,'SELECT * FROM '.$table);
		if(!$result){die('error has been occured while connecting to database');}
		$num_fields = mysqli_num_fields($result);
		
		$return.= 'DROP TABLE IF EXISTS '.$table.';';
		$row2 = mysqli_fetch_row(mysqli_query($link,'SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) {
			while($row = mysqli_fetch_row($result)){
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++){
					$row[$j] = addslashes($row[$j]);
					$row[$j] = str_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	
	//save file
	$filename='db-backup-'.date('Y-m-d-H-i-s',time()).'.sql';
	$handle = fopen($filename,'w+');
	fwrite($handle,$return);
	fclose($handle);
	if(!empty($email)){
		$mail = new PHPMailer;
		$mail->From = 'from@example.com';
		$mail->FromName = 'backup';
		$mail->addAddress($email);               // Name is optional
		//$mail->addBCC('bcc@example.com');
		
		$mail->addAttachment($filename, 'backup.sql');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		
		$mail->Subject = 'your site backup '.date('Y-m-d H:i:s',time());
		$mail->Body    = 'This is your site backup at date: <b>'.date('Y-m-d H:i:s',time()).'</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		if(!$mail->send()) {
			echo 'Backup File could not be sent.';
			echo 'E-Mail Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Backup File has been mailed';
		}	
	}
	return true;
}
?>