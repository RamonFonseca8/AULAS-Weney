<?php
require "conexao.php";
// Função para proteger textos exibidos no HTML
function e($valor) {
    return htmlspecialchars((string)$valor, ENT_QUOTES, "UTF-8");
}
// PROCESSAMENTO DOS FORMULÁRIOS
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acao = $_POST["acao"] ?? "";
    // CREATE: cadastrar aluno
    if ($acao === "cadastrar") {
        $nome = trim($_POST["nome"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $idade = filter_input(INPUT_POST, "idade", FILTER_VALIDATE_INT);
        if ($nome === "" || $email === "" || $idade === false || $idade === null || $idade < 0) {
            die("Preencha os campos corretamente.");
        }
        $sql = "INSERT INTO alunos (nome, email, idade)
                VALUES (:nome, :email, :idade)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":nome" => $nome,
            ":email" => $email,
            ":idade" => $idade
        ]);
        header("Location: cadastro.php?msg=cadastrado");
        exit;
    }
    // UPDATE: atualizar aluno
    if ($acao === "atualizar") {
        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        $nome = trim($_POST["nome"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $idade = filter_input(INPUT_POST, "idade", FILTER_VALIDATE_INT);
        if (!$id || $nome === "" || $email === "" || $idade === false || $idade === null || $idade < 0) {
            die("Dados inválidos para atualização.");
        }
        $sql = "UPDATE alunos
                SET nome = :nome, email = :email, idade = :idade
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":nome" => $nome,
            ":email" => $email,
            ":idade" => $idade,
            ":id" => $id
        ]);
        header("Location: cadastro.php?msg=atualizado");
        exit;
    }
    // DELETE: excluir aluno
    if ($acao === "excluir") {
        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        if (!$id) {
            die("Identificador inválido.");
        }
        $sql = "DELETE FROM alunos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":id" => $id]);
        header("Location: cadastro.php?msg=excluido");
        exit;
    }
}
