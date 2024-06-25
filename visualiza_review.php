<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de Reviews</title>
</head>
<body>
    <center>
        <h1>Reviews de Jogos</h1>
        <table border="4">
            <tr>
                <td>Nome</td>
                <td>Jogo</td>
                <td>Data de Término</td>
                <td>Console</td>
                <td>Nota</td>
                <td>Review</td>
                <td>Ações</td>
            </tr>
            <?php
                require("connect.php");

                $dados_select = mysqli_query($conn, "SELECT id, nome, jogo, data_termino, console, nota, review FROM reviews");

                while($dado = mysqli_fetch_array($dados_select)) {
                    echo '<tr>';
                    echo '<td>'.$dado['nome'].'</td>';
                    echo '<td>'.$dado['jogo'].'</td>';
                    echo '<td>'.$dado['data_termino'].'</td>';
                    echo '<td>'.$dado['console'].'</td>';
                    echo '<td>'.$dado['nota'].'</td>';
                    echo '<td>'.$dado['review'].'</td>';
                    echo '<td>
                        <a href="update_review.php?id='.$dado['id'].'"><button>Update</button></a>
                        <a href="delete_review.php?id='.$dado['id'].'" onclick="return confirm(\'Are you sure you want to delete this review?\')"><button>Delete</button></a>
                        </td>';
                    echo '</tr>';
                }
                $conn->close();
            ?>
        </table>
        <br />
        <a href="index.html"><input type="button" value="Voltar"></a>
    </center>
</body>
</html>
