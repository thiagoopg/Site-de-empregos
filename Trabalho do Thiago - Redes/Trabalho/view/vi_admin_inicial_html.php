<!DOCTYPE html>
<?php
   include '../cont/ct_iniciar_sessao.php';
   if (isset($_SESSION['usuario']))	{
      $usuario = $_SESSION['usuario'];
    }
    if (isset($_SESSION['admin']))	{
      $admin = $_SESSION['admin'];
    }
   ?>
<html>
   <head>
      <link href="style.css" rel="stylesheet">
      <meta charset="utf-8">
      <title>Página Inicial do Admin - Craps</title>
   </head>
   <body>
   <main>
      <div class="box">
         <h1><?php echo $usuario;?> - Craps</h1>
      </div>
      <div class="box">
         <!--<p><a href="vi_form_entrevista_html.php">Formulário para Entrevista</a></p>-->
         <p><a href="vi_documentacao_html.php">Documentação dos Candidatos à Avaliar</a></p>
         <!--<p><a href="vi_pos_entrevista_html.php">Dados Pós-Entrevista</a></p>-->
      </div>
                     <?php
      if($admin == '1'){
      echo '<div class="box">';

      
         echo '<p><a href="vi_admin_tabela_vagas_html.php">Personalizar Vagas</a></p>';
         //echo '<p><a href="vi_documentacao_html.php">Personalizar formulários</a></p>';}
         
      echo '</div>';
      }?>
      <div class="box">
               <p><a href="../cont/ct_logout.php">Logout</a></p>

      </div>
</main>
   </body>
</html>