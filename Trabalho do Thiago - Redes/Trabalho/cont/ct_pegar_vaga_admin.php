<?php
   if (isset($_GET["vaga"]) ) {
   	$vaga = $_GET["vaga"];
   }
   else {
      header("location:../view/vi_admin_tabela_vagas_html.php");
   }
   
   
   //puxa a vaga determinada pelo id
   $sql = "SELECT vaga.id_vaga, vaga.cargo, filial.id_filial, filial.cidade, vaga.salario, vaga.descricao FROM `vaga` JOIN filial ON vaga.fk_filial = filial.id_filial WHERE vaga.id_vaga = ".$vaga;
   $query = mysqli_query($conn,$sql);
   $resultado_vaga = mysqli_fetch_array($query);
   include '../cont/ct_pegar_filiais.php';
   //form
   echo '<form method="post" action="../cont/ct_editar_vaga.php">';
      echo '<input type="hidden" name="id" value="'.$resultado_vaga['id_vaga'].'">';
      echo '<label for="cargo">Cargo:</>';
      echo '<input type="text" name="cargo" class="edit" value="'.$resultado_vaga['cargo'].'">';
      echo '<label for="filial">Filial:</>';
      echo '<select id="filial" name="filial" class="edit">';
      //select filial
      foreach($resultado_filial as $rf){
         
      echo "<option value='".$rf['id_filial']."'";
      if($rf['id_filial'] == $resultado_vaga['id_filial']){
         echo " selected";
      }
      echo ">";
      echo $rf['cidade']." - ".$rf['name_estado'];
      echo " </option>";
      }
      //form
      echo '</select>';
      echo '<label for="salario">Salário:</>';
      echo '<input type="text" name="salario" class="edit" value="'.$resultado_vaga['salario'].'">';
      echo '<label for="descricao">Descrição da vaga:</>';
      echo '<textarea name="descricao" class="edit" cols="50">'.$resultado_vaga['descricao'].'</textarea><br><br>';
      echo '<input type="submit" value="Enviar">';
   echo '</form>';
 ?>