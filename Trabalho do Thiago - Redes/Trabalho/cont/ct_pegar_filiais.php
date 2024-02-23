<?php
   $sql = "SELECT filial.id_filial, estado.name_estado, filial.cidade FROM filial JOIN estado ON estado.id_estado = filial.fk_estado;";

   $query = mysqli_query($conn,$sql);
   $resultado_filial = mysqli_fetch_all($query, MYSQLI_ASSOC);
      /*$id = $resultado_filial['id_filial'];
      $cidade = $resultado_filial['cidade'];
      $estado = $resultado['name_estado'];
      echo "<option value='".$id."'>".$cidade." - ".$estado." </option>";
      */
 ?>