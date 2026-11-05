<?php
require "conexao.php";
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
// READ: buscar todos os alunos para exibir na tabela
$sql = "SELECT id, nome, email, idade FROM alunos ORDER BY id DESC";
$stmt = $pdo->query($sql);
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Buscar um aluno específico quando o usuário clicar em Editar
$alunoEdicao = null;
if (($_GET["acao"] ?? "") === "editar") {
    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
    if ($id) {
        $stmt = $pdo->prepare("SELECT id, nome, email, idade FROM alunos WHERE id = :id");
        $stmt->execute([":id" => $id]);
        $alunoEdicao = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de alunos</title>
</head>
<body>
<h1>Cadastro de alunos</h1>
<?php
$msg = $_GET["msg"] ?? "";
if ($msg === "cadastrado") {
    echo "<p>Aluno cadastrado com sucesso!</p>";
} elseif ($msg === "atualizado") {
    echo "<p>Aluno atualizado com sucesso!</p>";
} elseif ($msg === "excluido") {
    echo "<p>Aluno excluído com sucesso!</p>";
}
?>
<h2><?php echo $alunoEdicao ? "Editar aluno" : "Novo aluno"; ?></h2>
<form method="POST" action="cadastro.php">
    <?php if ($alunoEdicao): ?>
        <input type="hidden" name="acao" value="atualizar">
        <input type="hidden" name="id" value="<?php echo e($alunoEdicao["id"]); ?>">
    <?php else: ?>
        <input type="hidden" name="acao" value="cadastrar">
    <?php endif; ?>
    <label>Nome:</label>
    <input type="text" name="nome" required
        value="<?php echo e($alunoEdicao["nome"] ?? ""); ?>">
    <br><br>
    <label>E-mail:</label>
    <input type="email" name="email" required
        value="<?php echo e($alunoEdicao["email"] ?? ""); ?>">
    <br><br>
    <label>Idade:</label>
    <input type="number" name="idade" min="0" required
        value="<?php echo e($alunoEdicao["idade"] ?? ""); ?>">
    <br><br>
    <button type="submit">
        <?php echo $alunoEdicao ? "Salvar alterações" : "Cadastrar aluno"; ?>
    </button>
    <?php if ($alunoEdicao): ?>
        <a href="cadastro.php">Cancelar edição</a>
    <?php endif; ?>
</form>
<hr>
<h2>Alunos cadastrados</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Idade</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($alunos as $aluno): ?>
        <tr>
            <td><?php echo e($aluno["id"]); ?></td>
            <td><?php echo e($aluno["nome"]); ?></td>
            <td><?php echo e($aluno["email"]); ?></td>
            <td><?php echo e($aluno["idade"]); ?></td>
            <td>
                <a href="cadastro.php?acao=editar&id=<?php echo e($aluno["id"]); ?>">
                    Editar
                </a>
                <form method="POST" action="cadastro.php" style="display:inline;"
                      onsubmit="return confirm('Deseja realmente excluir este aluno?');">
                    <input type="hidden" name="acao" value="excluir">
                    <input type="hidden" name="id" value="<?php echo e($aluno["id"]); ?>">
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
