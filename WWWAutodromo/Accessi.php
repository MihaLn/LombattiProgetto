<html>
<head>
<link href="index.css" rel="stylesheet" type="text/css">
<title> Elenco Accessi Utente </title>
</head>
<body>
<div class="container">  
<form id="contact">
<?php
include("connetti.php");
session_start();
$nome=$_SESSION['Nome'];
$cognome=$_SESSION['Cognome'];
$email=$_SESSION['Email'];
$CF=$_SESSION['CF'];

echo ("<center> <h2>Dati utente: </h2></center>");
echo("<center><table border='1'  bordercolor='#4CAF50'>
		<tr><td>Nome</td><td>Cognome</td><td>Email</td></tr>
		<tr><td>" .$nome. "</td><td>" .$cognome. "</td><td>" .$email. "</td></tr>
	</table></center>");
echo("<br><br>");
$query = "SELECT DataPartecipazione
			FROM scarichi INNER JOIN partecipanti ON codPar = CF
			WHERE CF = '$CF'";
	
	$risultato = mysqli_query($conn,$query) or die("Errore nell'esecuzione della query.");
	
echo ("<center> <h2>Accesso(CF): " .$CF. "</h2></center>
	<center><table border='1'  bordercolor='#4CAF50'>");
$i=0;
$t=mysqli_num_rows($risultato);

for($i;$i<$t;$i=$i+1)
{
		$riga = mysqli_fetch_assoc($risultato);
		$_SESSION['DataPartecipazione']=$riga['DataPartecipazione'];
		
		echo("<tr><td>Data: " .$riga['DataPartecipazione']. "</td></tr>");
}
echo("</table></center>");	
		
?>	

</form>
</div>
</body>
</html>