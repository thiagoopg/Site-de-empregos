<!DOCTYPE html<html>
  <?php
  // Conectar ao banco de dados
  include '../cont/ct_database_conect.php';
if (isset($_GET["filial"])) {
  $filial = $_GET["filial"];
} else {
  $filial = "0";
}
if (isset($_GET["vaga"])) {
  $vaga = $_GET["vaga"];
} else {
  $vaga = "0";
}
    ?>
<head>
   <link href="style.css" rel="stylesheet">
  <title>Dados do Candidato</title>
  <style>
    body {
      font-size: 16px;
      line-height: 1.5;
    }
    h1 {
      text-align: center;
      margin-top: 50px;
      margin-bottom: 30px;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 30px;
      border: 1px solid #ddd;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    th, td {
      text-align: left;
      padding: 12px;
    }
  </style>
  <script>
      function enviarEscolha() {
        var escolha = document.getElementById("filial").value;
        window.location.href = window.location.pathname + "?filial=" + escolha;
      }
      function enviarEscolhas() {
        var escolha = document.getElementById("filial").value;
        var filial = "?filial=" + escolha;
        var escolha2 = document.getElementById("vaga").value;
        var vaga = filial + "&vaga=" + escolha2;
        window.location.href = window.location.pathname + vaga;
      }
    </script>
</head>
<body>
<main>
  <h1>Dados do Candidato</h1>

    <label>Qual filial?</label><br>
    <select id="filial" name="filial" onchange="enviarEscolha()">
        <option value="0">-</option>
        <?php
        include "../cont/ct_pegar_filiais.php";
        foreach ($resultado_filial as $rf) {
          echo "<option value='" . $rf["id_filial"] . "' for='filial'";
          if ($rf["id_filial"] == $filial) {
            echo " selected";
          }
          echo ">";
          echo $rf["cidade"] . " - " . $rf["name_estado"];
          echo " </option>";
        }
        ?>
      </select>
      <br><br>
      <label>Qual vaga?</label><br>
      <select id="vaga" name="vaga" onchange="enviarEscolhas()">
      <option value="0">-</option>
        <?php
        if ($filial == 0) {
          $where = "0";
        } else {
          $where = "WHERE id_filial = '" . $filial . "'";
        
        $sql =
          "SELECT vaga.id_vaga, vaga.cargo, filial.cidade, vaga.salario, vaga.descricao FROM `vaga` JOIN filial ON vaga.fk_filial = filial.id_filial " .
          $where .
          " ORDER BY `vaga`.`id_vaga` ASC";
        $query = mysqli_query($conn, $sql);
        $resultado_vaga = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach ($resultado_vaga as $rv) {
          echo "<option value='" . $rv["id_vaga"] . "'";
          echo " for='vaga'";
          if ($rv["id_vaga"] == $vaga) {
            echo " selected";
          }
          echo ">";
          echo $rv["cargo"] . " - " . $rv["salario"];
          echo " </option>";
        }
        }
        ?>
        </select>
      <br><br>
    <?php
    //comentarioooooooooooooooooooooooo tabelaaaaaaaaaaaaaaaa
    $sql = "SELECT fk_candidato FROM histórico WHERE fk_vaga = $vaga;";
    $query = mysqli_query($conn, $sql);
    $resultado_candidatos = mysqli_fetch_all($query, MYSQLI_ASSOC);
    echo "<table>";
    echo "<tr> <th>Nome</th>   <th>CPF</th>   <th>email</th>   </tr>";
    

    foreach ($resultado_candidatos as $rcs) {
      $sql = "SELECT * FROM candidato WHERE id_candidato = ".$rcs['fk_candidato'].";";
      $query = mysqli_query($conn, $sql);
      $resultado_dados = mysqli_fetch_all($query, MYSQLI_ASSOC);
       foreach($resultado_dados as $rd){
          echo "<tr>";
        echo "<td>" . $rd["nome"] . "</td>";
        echo "<td>" . $rd["cpf"] . "</td>";
        echo "<td>" . $rd["email"] . "</td>";
            echo "</tr>";
       }
  }

    echo "</table>";
  ?>
  <div class="voltar">
         <br><br>              
  <a href="vi_admin_inicial_html.php">Voltar para a página inicial</a>
      </div>
  </main>
<body>

</html>