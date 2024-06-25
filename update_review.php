<?php
require('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $jogo = $_POST['jogo'];
    $data_termino = $_POST['date_finished'];
    $console = $_POST['console'];
    $nota = $_POST['nota'];
    $review = $_POST['review'];

    $sql = "UPDATE reviews SET nome='$nome', jogo='$jogo', data_termino='$data_termino', console='$console', nota='$nota', review='$review' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<center><h1>Review Atualizado com Sucesso</h1>";
        echo "<a href='visualiza_review.php'><input type='button' value='Voltar'></a></center>";
    } else {
        echo "<h3>OCORREU UM ERRO: </h3>" . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM reviews WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!doctype html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" type="text/css" href="projeto_definitivo.css" media="screen">
            <title>Update Review</title>
        </head>

        <body>
            <div>
                <h1 id="titulo">Atualize Sua Review</h1>
                <p id="subtitulo">Por favor, preencha o formulário abaixo</p>
                <br>
            </div>

            <form method="POST" action="update_review.php">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <div class="campo">
                    <label for="nome"><strong>Nome do usuário</strong></label>
                    <input type="text" name="nome" id="nome" value="<?php echo $row['nome']; ?>" required>
                </div>

                <div class="campo">
                    <label for="jogo"><strong>Nome do jogo</strong></label>
                    <input type="text" name="jogo" id="jogo" value="<?php echo $row['jogo']; ?>" required>
                </div>

                <div class="campo">
                    <label for="date_finished"><strong>Data em que você terminou o jogo</strong></label>
                    <input type="date" name="date_finished" id="date_finished" value="<?php echo $row['data_termino']; ?>">
                </div>

                <div class="campo">
                    <label><strong>Console</strong></label>
                    <label>
                        <input type="radio" name="console" value="Playstation" <?php echo ($row['console'] == 'Playstation') ? 'checked' : ''; ?> required>Playstation
                    </label>
                    <label>
                        <input type="radio" name="console" value="Xbox" <?php echo ($row['console'] == 'Xbox') ? 'checked' : ''; ?>>Xbox
                    </label>
                    <label>
                        <input type="radio" name="console" value="Nintendo" <?php echo ($row['console'] == 'Nintendo') ? 'checked' : ''; ?>>Nintendo
                    </label>
                    <label>
                        <input type="radio" name="console" value="PC" <?php echo ($row['console'] == 'PC') ? 'checked' : ''; ?>>PC
                    </label>
                </div>

                <div class="campo">
                    <label><strong>Nota</strong></label>
                    <?php for ($i = 1; $i <= 10; $i++) { ?>
                        <label>
                            <input type="radio" name="nota" value="<?php echo $i; ?>" <?php echo ($row['nota'] == $i) ? 'checked' : ''; ?> required><?php echo $i; ?>
                        </label>
                    <?php } ?>
                </div>

                <div class="campo">
                    <label for="review"><strong>Review</strong></label>
                    <textarea rows="6" style="width: 26em" id="review" name="review" maxlength="500" required><?php echo $row['review']; ?></textarea>
                </div>

                <div class="botao-container">
                    <button class="botao" type="submit">Atualizar</button>
                </div>
            </form>
        </body>

        </html>
        <?php
    } else {
        echo "Review não encontrado.";
    }

    $conn->close();
}
?>
