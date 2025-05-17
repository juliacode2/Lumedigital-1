<!DOCTYPE html>
<html>

<head>

<title></title>
<meta charset="utf-8">

</head>

<body>



<?php
session_start();
	
if(isset($_GET['sai']) && $_GET['sai'] == 'sair')
{
	$_SESSION['autenticado'] = 'NAO';
	session_destroy();
	header('Location: ../index.php');
 exit;
}
?>

?>


</body>
</html>

