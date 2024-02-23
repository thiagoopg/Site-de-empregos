<?php
include'ct_database_conect.php';

$id = $_GET["vaga"];

$sql = "DELETE FROM vaga WHERE id_vaga = $id";

if($query = mysqli_query($conn,$sql)){
   header("location:../view/vi_admin_tabela_vagas_html.php");
}else{
   echo '<p>algo inesperado aconteceu, volte para a tabela</p>';
   echo '<button><a href="../view/vi_admin_tabela_vagas_html.php">voltar</a></button>';
}