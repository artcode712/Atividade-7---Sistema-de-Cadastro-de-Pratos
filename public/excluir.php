<?php

require_once "../infra/conexao.php";

$id = $_GET["id"];

$stmt = $conexao->prepare(
   "DELETE FROM pratos WHERE id = ?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: listar.php");
exit;
 