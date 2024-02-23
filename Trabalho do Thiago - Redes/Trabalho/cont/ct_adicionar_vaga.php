<?php
include'ct_database_conect.php';

$filial = $_POST["filial"];
$cargo = $_POST["cargo"];
$salario = $_POST["salario"];
$descricao = $_POST["descricao"];

$sql = "INSERT INTO vaga(fk_filial,cargo,salario,descricao) VALUES ('".$filial."', '".$cargo."', '".$salario."', '".$descricao."')";

if($query = mysqli_query($conn,$sql)){
   header("location:../view/vi_admin_tabela_vagas_html.php");
}else{
   echo '<p>algo inesperado aconteceu, volte para a tabela</p>';
   echo '<button><a href="../view/vi_admin_tabela_vagas_html.php">voltar</a></button>';
}