<?
//echo $_SERVER['REMOTE_ADDR'];

if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
	// Вариант 1
	//echo 'Доступ запрещен PHP';
	
	// Вариант 2 - переадресация
	header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: /3/deny.php"); 
	
	exit;	
}

echo 'Доступ разрешен';
