<?php

require_once "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["tipo"] == "usuario") {

        $nome = $_POST["nome"];
        $email = $_POST["email"];

        if ($nome != "" && $email != "") {

            $stmt = $conexao->prepare(
                "INSERT INTO usuarios (nome, email) VALUES (?, ?)"
            );

            $stmt->bind_param("ss", $nome, $email);
            $stmt->execute();
        }

    } else {

        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $preco = $_POST["preco"];
        $categoria = $_POST["categoria"];
        $usuario_id = $_POST["usuario_id"];

        if (
            $nome != "" &&
            $descricao != "" &&
            $preco != "" &&
            $categoria != "" &&
            $usuario_id != ""
        ) {

            $stmt = $conexao->prepare(
                "INSERT INTO pratos
                (nome, descricao, preco, categoria, usuario_id)
                VALUES (?, ?, ?, ?, ?)"
            );

            $stmt->bind_param(
                "ssdsi",
                $nome,
                $descricao,
                $preco,
                $categoria,
                $usuario_id
            );

            $stmt->execute();
        }
    }
}

$usuarios = $conexao->query(
    "SELECT id, nome FROM usuarios ORDER BY nome"
);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>

    <link rel="stylesheet" href="style/index.php">

</head>

<body>

    <h1>Cadastro</h1>

    <h2>Usuário</h2>

    <form method="POST">

        <input type="hidden" name="tipo" value="usuario">

        <input
            type="text"
            name="nome"
            placeholder="Nome"
            required
        >

        <input
            type="email"
            name="email"
            placeholder="E-mail"
            required
        >

        <button>Cadastrar usuário</button>

    </form>


    <h2>Prato</h2>

    <form method="POST">

        <input type="hidden" name="tipo" value="prato">

        <input
            type="text"
            name="nome"
            placeholder="Nome do prato"
            required
        >

        <input
            type="text"
            name="descricao"
            placeholder="Descrição"
            required
        >

        <input
            type="number"
            name="preco"
            placeholder="Preço"
            step="0.01"
            required
        >

        <input
            type="text"
            name="categoria"
            placeholder="Categoria"
            required
        >

        <select name="usuario_id" required>

            <option value="">
                Usuário responsável
            </option>

            <?php while ($usuario = $usuarios->fetch_assoc()): ?>

                <option value="<?= $usuario["id"] ?>">
                    <?= htmlspecialchars($usuario["nome"]) ?>
                </option>

            <?php endwhile; ?>

        </select>

        <button>Cadastrar prato</button>

    </form>

    <a href="../index.php">Voltar</a>

</body>

</html>