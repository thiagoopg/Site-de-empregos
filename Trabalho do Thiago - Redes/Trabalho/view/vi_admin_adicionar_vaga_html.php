<!DOCTYPE html>
<?php
   include '../cont/ct_iniciar_sessao.php';
   include '../cont/ct_database_conect.php';
   include '../cont/ct_pegar_filiais.php';
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


      <form method="post" action="../cont/ct_adicionar_vaga.php">
      <input type="hidden" name="id">
      <label for="cargo">Cargo:</>
      <input type="text" name="cargo" class="edit">
      <label for="filial">Filial:</>
      <select id="filial" name="filial" class="edit">
      <?php
	  foreach($resultado_filial as $rf){
         
      echo "<option value='".$rf['id_filial']."'";
      echo ">";
      echo $rf['cidade']." - ".$rf['name_estado'];
      echo " </option>";
      }
	  ?>
       </select>
       <label for="salario">Salário:</>
       <input type="text" name="salario" class="edit">
       <label for="descricao">Descrição da vaga:</>
       <textarea name="descricao" class="edit" cols="50"></textarea><br><br>
       <input type="submit" value="Enviar">
    </form>

      <br><br><br>

            

         <a href="vi_admin_tabela_vagas_html.php">Voltar para a página inicial</a>
         </div>

</main>
   </body>
</html>