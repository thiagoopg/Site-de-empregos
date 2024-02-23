<!DOCTYPE html>
<?php
if (!isset($_SESSION)) {
  session_start();
}
include "../cont/ct_database_conect.php";
if (isset($_GET["filial"])) {
  $filial = $_GET["filial"];
} else {
  $filial = "0";
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet">
    <title>Formulário Craps</title>
    <script>
// Esta função é acionada quando o usuário envia a escolha da filial.
// Ela obtém o valor selecionado no elemento HTML com o ID "filial" e adiciona esse valor como um parâmetro na URL da página atual.
// Em seguida, a função redireciona o usuário para a nova URL, que inclui o parâmetro "filial".
      function enviarEscolha() {
        var escolha = document.getElementById("filial").value;
        window.location.href = window.location.pathname + "?filial=" + escolha;
      }
    </script>

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
    <h1 style="text-align:center;">Craps - Formulário de Candidatura</h1>
    <form method="post" action="../cont/ct_pegar_candidato.php" onSubmit="return testa_campos()" style="margin: 0 auto; width: 50%;">
    
      <label for="nome">Nome Completo:</label><br>
      <input type="text" name="nome" id="nome" size="40" maxlength="40" required><br><br>
      
      <label for="cpf">cpf:</label><br>
      <input type="text" name="cpf" id="cpf" size="40" maxlength="40" required><br><br>
      
      <label for="email">email:</label><br>
      <input type="text" name="email" id="email" size="40" maxlength="40" required><br><br>
      
      <label>Qual de nossas filiais deseja trabalhar?</label><br>
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
      <label>Qual das vagas deseja entrar?</label><br>
      <select id="vaga" name="vaga">
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
          echo " for='vaga'>";
          echo $rv["cargo"] . " - " . $rv["salario"];
          echo " </option>";
        }
        }
        ?>
      </select>
      <br><br>
      <input type="submit" name="enviar" value="Enviar Formulário"><br><br>
    </form>
    <div class="voltar">
      <br><br>      
      <a href="vi_inicial.html">Voltar para a página inicial</a>
    </div>
    <footer id="footer-fixo">
       <p>&copy; 2023 Craps - Todos os direitos reservados.</p>
    </footer>
  </body>
     <script>
      // Armazena os valores dos inputs no localStorage quando os valores são alterados
      document.getElementById('nome').addEventListener('change', function() {
        localStorage.setItem('nome', this.value);
      });

      document.getElementById('cpf').addEventListener('change', function() {
        localStorage.setItem('cpf', this.value);
      });

      document.getElementById('email').addEventListener('change', function() {
        localStorage.setItem('email', this.value);
      });

      // Preenche os inputs com os valores armazenados no localStorage quando a página é carregada
      window.addEventListener('load', function() {
        var nome = localStorage.getItem('nome');
        if (nome) {
          document.getElementById('nome').value = nome;
        }

        var cpf = localStorage.getItem('cpf');
        if (cpf) {
          document.getElementById('cpf').value = cpf;
        }

        var email = localStorage.getItem('email');
        if (email) {
          document.getElementById('email').value = email;
        }
      });
    </script>
</html>