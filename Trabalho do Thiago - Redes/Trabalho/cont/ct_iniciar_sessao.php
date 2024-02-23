<?php
   if(!isset($_SESSION))
   	session_start();
   if(!isset($_SESSION['usuario']))	
   	header("location:vi_admin_html.php?msg=Você não efetuou o login.")
   ?>