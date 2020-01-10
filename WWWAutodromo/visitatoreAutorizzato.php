<html>
<head>
<link href="index.css" rel="stylesheet" type="text/css">
<title> Autodromo Varano de' Melegari </title>
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

$query="SELECT CF,Email, Nome, Cognome, Telefono,DataNascita FROM partecipanti WHERE CF='$CF' AND DATEDIFF(CURRENT_DATE,DataNascita)<=(365*18)+4";
$result=mysqli_query($conn,$query) or die("Errore nell'esecuzione della query.");

if(mysqli_num_rows($result)==1)
{echo("minorenne");}
else
{echo("maggiorenne");}

echo ("<center> <h2>Dati utente: </h2></center>");
//echo ("Nome: " .$nome. "<br>");
//echo ("Cognome: " .$cognome. "<br>");
//echo ("Email: " .$email. "<br>");

echo("<center><table border='1'  bordercolor='#4CAF50'>
		<tr><td>Nome</td><td>Cognome</td><td>Email</th></tr>
		<tr><td>" .$nome. "</td><td>" .$cognome. "</td><td>" .$email. "</td></tr>
	</table></center>");

	
echo("<br> <br> <br>");
	//echo('<p align="right">Buongiorno ').($_SESSION['Nome'].' '.$_SESSION['Cognome'].'<br>').('Questa è la tua sezione riservata.</p>'); 
?>	

	<!-- elenco accessi autodromo -->
	<fieldset>
		<input type="button" id="contact" onclick="location.href='Accessi.php'" value="Elenco Accessi"/>
    </fieldset>
	<!-- elenco automezzi utilizzati -->
	<fieldset>
		<input type="button" id="contact" onclick="location.href='Automezzi.php'" value="Elenco Automezzi Utilizzati"/>
    </fieldset>
	<!-- elenco partecipazione tipo eventi -->
	<fieldset>
		<input type="button" id="contact" onclick="location.href='PartecipazioneTipoEventi.php'" value="Elenco Partecipazione Tipo Eventi"/>
    </fieldset>
	<!-- elenco partecipazione eventi -->
	<fieldset>
		<input type="button" id="contact" onclick="location.href='PartecipazioneEventi.php'" value="Elenco Partecipazione Eventi"/>
    </fieldset>
	<!-- calendario partecipazione tipo eventi -->
	<fieldset>
		<input type="button" id="contact" onclick="location.href='PartecipazioneTipoEventi.php'" value="Calendario Partecipazione Tipo Eventi"/>
    </fieldset>

</form>
</div>
</body>
</html>