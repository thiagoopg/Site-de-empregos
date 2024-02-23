<!DOCTYPE html>
<?php   
   include '../cont/ct_iniciar_sessao.php';
   include '../cont/ct_database_conect.php';
   if (isset($_GET["filial"]) ) {
   	$filial = $_GET["filial"];
   }
   else {
   	$filial = "0";
   }
?>
<html>
   <head>
   <link href="style.css" rel="stylesheet">
   <script>
      function enviarEscolha() {
      var escolha = document.getElementById("filial").value;
       window.location.href = window.location.pathname + "?filial=" + escolha;
      }
   </script>
      <meta charset="utf-8">
      <title>Personalizar Vagas - Craps</title>
   </head>
   <body>
         <h1>Vagas</h1>
      <main>
      <p>Minha Filial: </p>
      <select id="filial" name="filial" onchange="enviarEscolha()">
         
         <?php
            include '../cont/ct_pegar_filiais.php';
            echo '<option value="0">Todas</option>';
            foreach($resultado_filial as $rf){
               echo "<option value='".$rf['id_filial']."'";
               if($rf['id_filial'] == $filial){
                  echo " selected";
               }
               echo ">";
               echo $rf['cidade']." - ".$rf['name_estado'];
               echo " </option>";
            }

          ?>
      </select>
      <br><br>
      <table>
         <tr>
            <th>Id</th>
            <th>Cargo</th>
            <th>Localidade</th>
            <th>Salário</th>
            <th>Descrição</th>
            <th>Editar</th>
            <th>Remover</th>
         </tr>
         <?php
            include'../cont/ct_pegar_vagas_admin.php';
         ?>
      </table>
      <button><a href="vi_admin_adicionar_vaga_html.php">Adicionar Vaga</a></button><br><br>

         <br><br>
         <a href="vi_admin_inicial_html.php">Voltar para a página inicial</a>
               </main>


   </body>
</html>