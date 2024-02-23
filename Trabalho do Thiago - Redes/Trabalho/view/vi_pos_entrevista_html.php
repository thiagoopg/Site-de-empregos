<!DOCTYPE html>
<?php
   if(!isset($_SESSION))
   	session_start();
   if(!isset($_SESSION['usuario']))	
   	header("location:vi_admin_html.php?msg=Você não efetuou o login.")
   ?>
<html>
   <link href="style.css" rel="stylesheet">
   <style>
      table, th, td {
      border:1px solid black;
      }
      body{
      font-family:arial;
      }
   </style>
   <body>
      <h2>Candidatos</h2>
      <table style="width:100%">
         <tr>
            <td>n°</td>
            <td>nome</td>
            <td>cidade</td>
            <td>Nota</td>
            <td>n° Softskills</td>
            <td>Opiniões</td>
         </tr>
         <tr>
            <td>001</td>
            <td>thiago</td>
            <td>porto alegre</td>
            <td>S</td>
            <td>3</td>
            <td>opniao do entrevistrador.</td>
         </tr>
      </table>
      <a href="vi_admin_inicial_html.php">Voltar para a página inicial</a>
   </body>
</html>