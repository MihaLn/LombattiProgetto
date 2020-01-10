<html>
<head>
<title> Elenco Scarichi Relativi ai Minori </title>
</head>
<body>
<?php
include("connetti.php");
session_start();
$nome=$_SESSION['Nome'];
$cognome=$_SESSION['Cognome'];
$email=$_SESSION['Email'];
$CF=$_SESSION['CF'];
echo ("<center> Dati utente: </center>");
//echo ("Nome: " .$nome. "<br>");
//echo ("Cognome: " .$cognome. "<br>");
//echo ("Email: " .$email. "<br>");

echo("<p>Nome: " .$nome. "</p><p>Cognome: " .$cognome. "</p><p>Email: " .$email. "</p>");

$query = "SELECT idScarico, codPar, DataPartecipazione, oraIn, oraOut
			FROM scarichi";
	
	$risultato = mysqli_query($conn,$query) or die("Errore nell'esecuzione della query.");
	
echo("<p>Accesso: " .$CF. "</p>");
$i=0;
$t=mysqli_num_rows($risultato);
echo("<p>Data: " .$i. "</p>");	
echo("<p>Data: " .$t. "</p>");	
//non esce dal ciclo
for($i;$i<$t;$i+1)
{
		$riga = mysqli_fetch_assoc($risultato);
		$_SESSION['idScarico']=$riga['idScarico'];
		$_SESSION['codPar']=$riga['codPar'];
		$_SESSION['DataPartecipazione']=$riga['DataPartecipazione'];
		$_SESSION['oraIn']=$riga['oraIn'];
		$_SESSION['oraOut']=$riga['oraOut'];
		echo("<p>ID: " .$riga['idScarico']. " CF Partecipante: " .$riga['codPar']. " Data: " .$riga['DataPartecipazione']." Dalle " .$riga['oraIn']." alle " .$riga['oraOut']."</p>");	
}
	
?>	