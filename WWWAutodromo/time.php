<?php
 session_start();
?>
<html>
	<head>
		<title>Tempo sessione</title>
	</head>

	<body>
		<?php
		 $ora = time();
		 $tempo = $ora - $_SESSION["ora"];
		 echo "Sono trascorsi $tempo secondi dall'inizio della sessione.";
		 session_unset();
		 session_destroy();
		?>
	</body>
</html>