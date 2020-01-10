<html>
<head>
<link href="index.css" rel="stylesheet" type="text/css">
<title> Autodromo Varano de' Melegari </title>
</head>
<body>
<div class="container">  
<form id="contact">
<?php
//include("connetti.php");
session_start();
$nome=$_SESSION['Nome'];
$cognome=$_SESSION['Cognome'];
$email=$_SESSION['Email'];
echo ("<center> Dati utente amministratore: </center>");
//echo ("Nome: " .$nome. "<br>");
//echo ("Cognome: " .$cognome. "<br>");
//echo ("Email: " .$email. "<br>");
echo("<br>");
echo("<table border='1'>
		<tr><td>Nome</td><td>Cognome</td><td>Email</th></tr>
		<tr><td>" .$nome. "</td><td>" .$cognome. "</td><td>" .$email. "</td></tr>
	</table>");
	echo("<br>");

	//echo('<p align="right">Buongiorno ').($_SESSION['Nome'].' '.$_SESSION['Cognome'].'<br>').('Questa è la tua sezione riservata.</p>'); 
?>	
	<!-- elenco scarichi di responsabilita -->
	<fieldset>
		<input type="button" id="contact" onclick="location.href='Scarichi.php'" value="Elenco Scarichi di Responsabilita"/>
    </fieldset>
	<!-- elenco scarichi relativi ai minori -->
	<fieldset>
		<input type="button" id="contact" onclick="location.href='ScarichiMinori.php'" value="Elenco Scarichi Relativi ai Minori"/>
    </fieldset>
	<!-- elenco dei minori scaricati -->
	<fieldset>
		<input type="button" id="contact" onclick="location.href='MinoriScaricati.php'" value="Elenco dei Minori Scaricati"/>
    </fieldset>
</form>
</div>
</body>
</html>