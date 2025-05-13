<?php
// session_start(); nao se usa session_start aqui, pois as paginas que incluem esta já possui a sessão estartada.
/* Abaixo, se o usuário estiver autenticado, mostra a foto dele, caso ele tenha alterado. Do contrário, mostra
   a foto padrão */
 if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM')
 {
?>
 
		<table border="0" width="900" align="center">
			
			<tr>
				
				<td align="right" height="89"><a href="login_f.php"> <img src="logo.jpg" height="50" width="50"> </td>
			</tr>
		</table>
		<hr/>

<?php
 }
 if(isset($_SESSION['lembra_foto']) && !isset($_SESSION['foto_alterada']))

 {
	 $ft = $_SESSION['lembra_foto'];

?>
	<table border="0" width="900" align="center">
			
			<tr>
				
				<td align="right" height="89"><a href="editar_usuario_f.php"> <img src="<?php echo $ft?>" height="50" width="50"> </td>
			</tr>	
		
	</table>
	<hr/>

<?php
 }

if(isset($_SESSION['foto_alterada']))

 {
	 $fa = $_SESSION['foto_alterada'];

?>
	<table border="0" width="900" align="center">
			
			<tr>
				
				<td align="right" height="89"><a href="editar_usuario_f.php"> <img src="<?php echo $fa?>" height="50" width="50"> </td>
			</tr>	
		
	</table>
	<hr/>
<?php
 }



// header("Refresh: 1; url=log_f.php");

 ?>
