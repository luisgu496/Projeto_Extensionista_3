<?php
require('connect.php');

$id = $_GET['id'];

$sql = "DELETE FROM reviews WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<center><h1>Review Deletado com Sucesso</h1>";
    echo "<a href='visualiza_review.php'><input type='button' value='Voltar'></a></center>";
} else {
    echo "<h3>OCORREU UM ERRO: </h3>" . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
