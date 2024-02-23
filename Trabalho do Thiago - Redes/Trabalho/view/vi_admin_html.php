<!DOCTYPE html>
<?php  
  if (isset($_GET[""])) {
    $msg = $_GET["msg"];
  } else {
    $msg = "";
  }
?>
<html>
  <head>
    <title>Login de Administrador</title>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet"> 
  </head>
  <body>
 
      <main>
         <div class="box">
        <h1>Login de Administrador</h1>
        <br>
        <?php 
          if ($msg != "") {
            echo('<p>' . $msg .'</p>');
          } else {
            $msg = "Bem-Vindo(a).";
            echo("<p>" . $msg ."</p>");
          }
        ?>
        <form method="post" name="form1" action="../cont/ct_login.php">
          <label for="usuario">Usuário:</label><br>
          <input type="text" name="usuario" id="usuario" maxlength="15" required>
          <br><br>
          <label for="senha">Senha:</label><br>
          <input type="password" name="senha" id="senha" maxlength="12" required><br><br>
          <input type="submit" name="login"="Login">
        </form>
        <div class="voltar">
         <br><br>              
         <a href="vi_inicial.html">Voltar para a página inicial</a>
      </div>
          </div>
      </main>
      

    <footer>
       <p>&copy; 2023 Craps - Todos os direitos reservados.</p>
    </footer>
  </body>
</html>