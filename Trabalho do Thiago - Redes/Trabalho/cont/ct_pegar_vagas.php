<?php
   $sql = "SELECT * FROM `vaga` ORDER BY `vaga`.`id_vaga` ASC";
   $query = mysqli_query($conn,$sql);
   while ($resultado = mysqli_fetch_array($query)){
      echo "<tr>";
      echo "<th>".$resultado['id_vaga']."</th>";
      echo "<th>".$resultado['cargo']."</th>";
      echo "<th>".$resultado['fk_filial']."</th>";
      echo "<th>".$resultado['salario']."</th>";
      echo "<th>".$resultado['descricao']."</th>";
      echo "<td><button><a href='vi_admin_pers_vaga_html.php'>X</a></button></td>";
      echo "<td><button>X</button></td>";
      echo "</tr>";
   }
 ?>