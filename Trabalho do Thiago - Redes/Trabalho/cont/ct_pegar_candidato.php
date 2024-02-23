<?php
include 'ct_database_conect.php';

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$vaga = $_POST["vaga"];

$sql = "SELECT id_candidato FROM candidato WHERE cpf = '$cpf'";
$query = mysqli_query($conn, $sql);
$id_candidato = mysqli_fetch_assoc($query);

if (empty($id_candidato['id_candidato'])) {
	$sql = "INSERT INTO candidato(nome,cpf,email) VALUES ('$nome','$cpf','$email')";
	$query = mysqli_query($conn,$sql);
	$sql = "SELECT id_candidato FROM candidato WHERE cpf = '$cpf'";
	$query = mysqli_query($conn, $sql);
	$id_candidato = mysqli_fetch_assoc($query);
}
$id_candidato = $id_candidato['id_candidato'];
$sql = "INSERT INTO histórico(fk_candidato,fk_vaga) VALUES ($id_candidato,$vaga)";
$query = mysqli_query($conn, $sql);

header("location:../view/vi_vagas_html.php");