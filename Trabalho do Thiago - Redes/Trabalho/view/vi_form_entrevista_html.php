<!DOCTYPE html>
<?php
   if(!isset($_SESSION))
   	session_start();
   if(!isset($_SESSION['usuario']))	
   	header("location:vi_admin_html.php?msg=Voc� n�o efetuou o login.")
   ?>
<html>
   <head>
      <link href="style.css" rel="stylesheet">
      <meta charset="utf-7">
      <title>Entrevista</title>
      <style>
         body{
         font-family:arial;
         }
      </style>
   </head>
   <body>
      <h1 style="text-align:center;">Craps - Entrevista</h1>
      <form name="entrevista" method="get" action="http://jkorpela.fi/cgi-bin/echo.cgi" style="margin: 0 auto; width: 50%;">
         C�digo da pessoa: <input type="text" name="nome" size="15" maxlength="30"></br><br>
         A quanto tempo est� no ramo de programa��o?<br>
         <select name="tempo">
            <option value="-1ano"> -1 ano </option>
            <option value="1ano"> 1 ano </option>
            <option value="2anos"> 2 anos </option>
            <option value="3anos"> +3 anos </option>
         </select>
         <br><br>
         Quais softskills aparenta ter?<br>
         <input type="checkbox" name="sskill" value="com">boa comunica��o<br>
         <input type="checkbox" name="sskill" value="lid">lideran�a<br>
         <input type="checkbox" name="sskill" value="cria">criativo<br>
         <input type="checkbox" name="sskill" value="press">trabalho sobre press�o<br><br> 
         Nota do praticante?<br>
         <input type="radio" name="nota" value="S">S<br>
         <input type="radio" name="nota" value="A">A<br>
         <input type="radio" name="nota" value="B">B<br>
         <input type="radio" name="nota" value="C">C<br><br>
         Pior erro da pessoa?<br>
         <select name="faltou" size="5" multiple>
            <option>N�o comunicou</option>
            <option>N�o soube liderar</option>
            <option>N�o soube programar</option>
            <option>Errou ao sofrer press�o</option>
            <option>Outro</option>
         </select>
         <br><br>
         De sua opini�o: <br>
         <textarea name="opiniao" rows="5" cols="50" placeholder="Digite aqui sua opini�o"></textarea>
         <br><br>
         </textarea><br><br>
         <input type="submit" name="enviar" value="Enviar dados"><br><br>
         <input type="reset" name="limpar" value="Limpa Formul�rio"><br><br>
      </form>
      <footer  style="text-align:center; margin: 0 auto;">
         <a href="vi_admin_inicial_html.php">Voltar para a p�gina inicial</a>
      </footer>
   </body>
</html>