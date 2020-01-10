<html>
<head>
<link href="index.css" rel="stylesheet" type="text/css">
<title> Elenco Partecipazione Eventi </title>
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

$query = "SELECT DataI, DataO, Titolo
			FROM (eventi INNER JOIN scarichi ON IdEvento = CodEv) INNER JOIN partecipanti ON codPar = CF
			WHERE codPar = '$CF'";
	
	$risultato = mysqli_query($conn,$query) or die("Errore nell'esecuzione della query.");
	
echo ("<center> <h2>Accesso(CF): " .$CF. "</h2></center>
	   <center><table border='1'  bordercolor='#4CAF50'>
	   <tr><td>Data Inizio</td><td>Data Fine</td><td>Titolo</td></tr>");
	   echo("<br>");
$i=0;
$t=mysqli_num_rows($risultato);

for($i;$i<$t;$i=$i+1)
{
		$riga = mysqli_fetch_assoc($risultato);
		$_SESSION['DataI']=$riga['DataI'];
		$_SESSION['DataO']=$riga['DataO'];
		$_SESSION['Titolo']=$riga['Titolo'];
		echo("<tr><td>Data: " .$riga['DataI']. "</td><td>" .$riga['DataO']. "</td><td>" .$riga['Titolo']. "</td></tr>");
}
echo("</table></center>");	
?>	

</div>  
</form>
</body>
</html>