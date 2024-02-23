<!DOCTYPE html>
<?php
   include '../cont/ct_database_conect.php';
   $sql = "SELECT * FROM `vaga` ORDER BY `vaga`.`id_vaga` ASC";
   $query = mysqli_query($conn,$sql);
?>
<html>
   <head>
      <meta charset="utf-8">
          <link href="style.css" rel="stylesheet">

      <title>Vagas - Craps</title>
   </head>
   <body>
      <header>
      <nav>
        <a href="vi_inicial.html" class="inicio">Craps</a>
        <ul>
          <li><a class="botao" href="vi_vagas_html.php"><span class="icon">&#x1F4BC;</span>Vagas</a></li>
          <li><a class="botao" href="vi_form_formulario_html.php"><span class="icon">&#x1F4DD;</span>Formulários</a></li>
          <li><a class="botao" href="vi_admin_html.php"><span class="icon">&#128274;</span>Adiministrador</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <table>
         <tr>
            <th>Tipo</th>
            <th>Localidade</th>
            <th>Salário</th>
            <th>Horário</th>
            
         </tr>
            <?php
               while ($resultado = mysqli_fetch_array($query)){
                  echo "<tr>";
                  echo "<th>".$resultado['cargo']."</th>";
                  echo "<th>".$resultado['fk_filial']."</th>";
                  echo "<th>".$resultado['salario']."</th>";
                  echo "<th>".$resultado['descricao']."</th>";
                  echo "</tr>";
               }
            ?>
      </table>
      <div class="voltar">
      <br><br>
      <a href="vi_inicial.html">Voltar para a página inicial</a>
      </div>
      </main>
      <footer id="footer-fixo">
         <p>&copy; 2023 Craps - Todos os direitos reservados.</p>
      </footer>
   </body>
</html>