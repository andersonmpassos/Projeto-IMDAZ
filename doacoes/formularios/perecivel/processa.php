<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_FLOAT);
$telefone = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_FLOAT);
$quantidade = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_NUMBER_FLOAT);
$data = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_NUMBER_FLOAT);

$result_usuario = "INSERT INTO cadastro (nome, email, idade, telefone, quantidade, data, created) VALUES ('$nome', '$email', '$idade', '$telefone', '$quantidade', '$data', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green';>Doação Cadastrada com Sucesso</p>";
    header("location: index.php");
}else{
    $_SESSION['msg'] = "<p style='color:red';>Doação não cadastrado</p>";
    header("location: index.php");
}