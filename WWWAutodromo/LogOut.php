<?php

//if($_REQUEST['LogOut']==1){
 $_SESSION=array(); // Resetta tutte le variabili di sessione.
 session_unset();
 session_destroy(); //DISTRUGGE la sessione.
 header("Location: index.php"); //si ricarica la pagina di login
 //exit; //si termina lo script in modo da ritornare alla schermata di login
//}
?>