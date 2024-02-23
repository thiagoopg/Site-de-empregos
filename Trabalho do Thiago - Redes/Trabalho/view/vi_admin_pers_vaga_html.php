<!DOCTYPE html>
<?php
   include '../cont/ct_iniciar_sessao.php';
   include '../cont/ct_database_conect.php';
?>
<html>
   <head>
      <link href="style.css" rel="stylesheet">
      <meta charset="utf-8">
      <title>Personalizar Vagas - Craps</title>

   </head>
   <body>

      <main>
             <div class="box">

         <h1>Vaga</h1>


      <?php
               include '../cont/ct_pegar_vaga_admin.php';
      ?>

      <br><br><br>

            

         <a href="vi_admin_tabela_vagas_html.php">Voltar para a página inicial</a>
         </div>

</main>
   </body>
</html>