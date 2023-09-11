<?php
//includes:
include 'backupDB/dbbackup.php';
backup_tables('localhost','root','','db_takhfif','*','jzcs89@gmail.com',true); //set charset utf8
backup_tables('localhost','root','','db_takhfif','*','jzcs89@gmail.com'); //use default charset
?>
