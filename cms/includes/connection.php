<?php
try{
 $pdo = new PDO('mysql:host=localhost;dbname=cmss','root', '');
}catch(PDOException $e){
	exit('Database Error.');
	}
?>