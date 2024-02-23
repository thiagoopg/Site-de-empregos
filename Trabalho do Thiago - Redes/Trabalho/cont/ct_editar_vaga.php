<?php
include'ct_database_conect.php';

$id = $_POST["id"];
$cargo =  $_POST["cargo"];
$filial = $_POST["filial"];
$salario = $_POST["salario"];
$descricao = $_POST["descricao"];

$sql = "UPDATE vaga SET cargo = '".$cargo."', fk_filial = '".$filial."', salario = '".$salario."', descricao = '".$descricao."' WHERE id_vaga = ".$id;
if($query = mysqli_query($conn,$sql)){
   header("location:../view/vi_admin_tabela_vagas_html.php");
}else{
   echo '<p>algo inesperado aconteceu, volte para a tabela</p>';
   echo '<button><a href="../view/vi_admin_tabela_vagas_html.php">voltar</a></button>';
}