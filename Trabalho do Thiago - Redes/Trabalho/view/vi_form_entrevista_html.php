<!DOCTYPE html>
<?php
   if(!isset($_SESSION))
   	session_start();
   if(!isset($_SESSION['usuario']))	
   	header("location:vi_admin_html.php?msg=Você não efetuou o login.")
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
         Código da pessoa: <input type="text" name="nome" size="15" maxlength="30"></br><br>
         A quanto tempo está no ramo de programação?<br>
         <select name="tempo">
            <option value="-1ano"> -1 ano </option>
            <option value="1ano"> 1 ano </option>
            <option value="2anos"> 2 anos </option>
            <option value="3anos"> +3 anos </option>
         </select>
         <br><br>
         Quais softskills aparenta ter?<br>
         <input type="checkbox" name="sskill" value="com">boa comunicação<br>
         <input type="checkbox" name="sskill" value="lid">liderança<br>
         <input type="checkbox" name="sskill" value="cria">criativo<br>
         <input type="checkbox" name="sskill" value="press">trabalho sobre pressão<br><br> 
         Nota do praticante?<br>
         <input type="radio" name="nota" value="S">S<br>
         <input type="radio" name="nota" value="A">A<br>
         <input type="radio" name="nota" value="B">B<br>
         <input type="radio" name="nota" value="C">C<br><br>
         Pior erro da pessoa?<br>
         <select name="faltou" size="5" multiple>
            <option>Não comunicou</option>
            <option>Não soube liderar</option>
            <option>Não soube programar</option>
            <option>Errou ao sofrer pressão</option>
            <option>Outro</option>
         </select>
         <br><br>
         De sua opinião: <br>
         <textarea name="opiniao" rows="5" cols="50" placeholder="Digite aqui sua opinião"></textarea>
         <br><br>
         </textarea><br><br>
         <input type="submit" name="enviar" value="Enviar dados"><br><br>
         <input type="reset" name="limpar" value="Limpa Formulário"><br><br>
      </form>
      <footer  style="text-align:center; margin: 0 auto;">
         <a href="vi_admin_inicial_html.php">Voltar para a página inicial</a>
      </footer>
   </body>
</html>