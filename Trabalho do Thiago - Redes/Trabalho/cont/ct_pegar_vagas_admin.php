<?php
   
   if($filial == 0){
      $where = '';
   }else{
      $where = "WHERE id_filial = '".$filial."'";
   }
   $sql = "SELECT vaga.id_vaga, vaga.cargo, filial.cidade, vaga.salario, vaga.descricao FROM `vaga` JOIN filial ON vaga.fk_filial = filial.id_filial ".$where." ORDER BY `vaga`.`id_vaga` ASC";
   $query = mysqli_query($conn,$sql);
   while ($resultado = mysqli_fetch_array($query)){
      echo "<tr>";
      echo "<th>".$resultado['id_vaga']."</th>";
      echo "<th>".$resultado['cargo']."</th>";
      echo "<th>".$resultado['cidade']."</th>";
      echo "<th>"."R$".$resultado['salario']."</th>";
      echo "<th>".$resultado['descricao']."</th>";
      echo "<td><button><a href='vi_admin_pers_vaga_html.php?vaga=".$resultado['id_vaga']."'>X</a></button></td>";
      echo "<td><button><a href='../cont/ct_remover_vaga.php?vaga=".$resultado['id_vaga']."'>X</a></button></td>";
      echo "</tr>";
   }
 ?>