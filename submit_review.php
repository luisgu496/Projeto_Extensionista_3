<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("connect.php");

$nome = $_POST['nome'];
$jogo = $_POST['jogo'];
$data_termino = $_POST['date_finished'];
$console = $_POST['console'];
$nota = $_POST['nota'];
$review = $_POST['review'];

$sql = "INSERT INTO reviews (nome, jogo, data_termino, console, nota, review)
VALUES ('$nome', '$jogo', '$data_termino', '$console', '$nota', '$review')";

if ($conn->query($sql) === TRUE) {
    echo "<center><h1>Review Inserido com Sucesso</h1>";
    echo "<a href='projeto_index.html'><input type='button' value='Voltar'></a></center>";
} else {
    echo "<h3>OCORREU UM ERRO: </h3>" . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
