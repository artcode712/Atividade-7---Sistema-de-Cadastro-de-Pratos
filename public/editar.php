<?php

include "../infra/conexao.php";

$id = $_GET["id"];
$sql = "SELECT * FROM restaurantes WHERE id = $id";
$resultado = mysqli_query($conexao, $sql );

$restaurante =mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>

    <link rel="stylesheet" href="style/index.php">

</head>


<body>
    <header>
        <h1>Restaurante</h1>
    </header>
    <main>
        <h2>Editando o Restuarante <?php echo $restaurante["nome"]?>!</h2>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $restaurante["id"]?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $restaurante["nome"]?>">
            <br>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" value="<?php echo $restaurante["descricao"]?>">
            <br>
            <label for="preco">Preço:</label>
            <input type="number" name="preco" value="<?php echo $restaurante["preco"]?>">
            <br>
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" value="<?php echo $restaurante["categoria"]?>">
            <br>
            <label for="usuario_id">Usuário:</label>
            <select name="usuario_id">
                <option value="">Selecione um usuário</option>
                <?php while ($usuario = $usuarios->fetch_assoc()): ?>
                    <option value="<?php echo $usuario["id"] ?>" <?php echo ($usuario["id"] == $restaurante["usuario_id"]) ? "selected" : "" ?>>
                        <?php echo $usuario["nome"] ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <br>
            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>


</body>

</html>