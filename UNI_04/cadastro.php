<?php

require "conexao.php";

 

// Função para proteger textos exibidos no HTML

function e($valor) {

    return htmlspecialchars((string)$valor, ENT_QUOTES, "UTF-8");

}

 

// PROCESSAMENTO DOS FORMULÁRIOS

if ($_SERVER["REQUEST_METHOD"] === "POST") {

 

    $acao = $_POST["acao"] ?? "";

 

    // CREATE: cadastrar Usuario

    if ($acao === "cadastrar") {

 

        $nome = trim($_POST["nome"] ?? "");

        $email = trim($_POST["email"] ?? "");

        $idade = filter_input(INPUT_POST, "idade", FILTER_VALIDATE_INT);

        $telefone = filter_input(INPUT_POST, "telefone", FILTER_VALIDATE_INT);

 

        if ($nome === "" || $email === "" || $idade === false || $idade === null || $idade < 0 || $telefone === false || $telefone === null || $telefone < 0) {

            die("Preencha os campos corretamente.");

        }

 

        $sql = "INSERT INTO usuario (nome, email, idade, telefone)

                VALUES (:nome, :email, :idade, :telefone)";

 

        $stmt = $pdo->prepare($sql);

        $stmt->execute([

            ":nome" => $nome,

            ":email" => $email,

            ":idade" => $idade,

            ":telefone" => $telefone

        ]);

 

        header("Location: cadastro.php?msg=cadastrado");

        exit;

    }    
      

    // UPDATE: atualizar Usuario

    if ($acao === "atualizar") {

 

        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

        $nome = trim($_POST["nome"] ?? "");

        $email = trim($_POST["email"] ?? "");

        $idade = filter_input(INPUT_POST, "idade", FILTER_VALIDATE_INT);

        $telefone = filter_input(INPUT_POST, "telefone", FILTER_VALIDATE_INT);

 

        if (!$id || $nome === "" || $email === "" || $idade === false || $idade === null || $idade < 0 || $telefone === false || $telefone === null || $telefone < 0) {

            die("Dados inválidos para atualização.");

        }

 

        $sql = "UPDATE usuario

                SET nome = :nome, email = :email, idade = :idade, telefone = :telefone

                WHERE id = :id";

 

        $stmt = $pdo->prepare($sql);

        $stmt->execute([

            ":nome" => $nome,

            ":email" => $email,

            ":idade" => $idade,

            ":telefone" => $telefone,

            ":id" => $id

        ]);

 

        header("Location: cadastro.php?msg=atualizado");

        exit;

    }

 

    // DELETE: excluir Usuario

    if ($acao === "excluir") {

 

        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

 

        if (!$id) {

            die("Identificador inválido.");

        }

 

        $sql = "DELETE FROM usuario WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([":id" => $id]);

 

        header("Location: cadastro.php?msg=excluido");

        exit;

    }

}

 

// READ: buscar todos os usuario para exibir na tabela

$sql = "SELECT id, nome, email, idade, telefone FROM usuario ORDER BY id DESC";

$stmt = $pdo->query($sql);

$usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

 

// Buscar um Usuario específico quando o usuário clicar em Editar

$UsuarioEdicao = null;

 

if (($_GET["acao"] ?? "") === "editar") {

    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

 

    if ($id) {

        $stmt = $pdo->prepare("SELECT id, nome, email, idade, telefone FROM usuario WHERE id = :id");

        $stmt->execute([":id" => $id]);

        $UsuarioEdicao = $stmt->fetch(PDO::FETCH_ASSOC);

    }

}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Cadastro de usuario</title>

</head>

<body>

 

<h1>Cadastro de usuario</h1>

 

<?php

$msg = $_GET["msg"] ?? "";

 

if ($msg === "cadastrado") {

    echo "<p>Usuario cadastrado com sucesso!</p>";

} elseif ($msg === "atualizado") {

    echo "<p>Usuario atualizado com sucesso!</p>";

} elseif ($msg === "excluido") {

    echo "<p>Usuario excluído com sucesso!</p>";

}

?>

 

<h2><?php echo $UsuarioEdicao ? "Editar Usuario" : "Novo Usuario"; ?></h2>

 

<form method="POST" action="cadastro.php">

 

    <?php if ($UsuarioEdicao): ?>

        <input type="hidden" name="acao" value="atualizar">

        <input type="hidden" name="id" value="<?php echo e($UsuarioEdicao["id"]); ?>">

    <?php else: ?>

        <input type="hidden" name="acao" value="cadastrar">

    <?php endif; ?>

 

    <label>Nome:</label>

    <input type="text" name="nome" required

        value="<?php echo e($UsuarioEdicao["nome"] ?? ""); ?>">

    <br><br>

 

    <label>E-mail:</label>

    <input type="email" name="email" required

        value="<?php echo e($UsuarioEdicao["email"] ?? ""); ?>">

    <br><br>

 

    <label>Idade:</label>

    <input type="number" name="idade" min="0" required

        value="<?php echo e($UsuarioEdicao["idade"] ?? ""); ?>">

    <br><br>



    <label>Telefone:</label>

    <input type="tel" name="telefone" required

        value="<?php echo e($UsuarioEdicao["telefone"] ?? ""); ?>">

    <br><br>

 

    <button type="submit">

        <?php echo $UsuarioEdicao ? "Salvar alterações" : "Cadastrar Usuario"; ?>

    </button>

 

    <?php if ($UsuarioEdicao): ?>

        <a href="cadastro.php">Cancelar edição</a>

    <?php endif; ?>

 

</form>

 

<hr>

 

<h2>usuario cadastrados</h2>

 

<table border="1" cellpadding="8">

    <tr>

        <th>ID</th>

        <th>Nome</th>

        <th>E-mail</th>

        <th>Idade</th>

        <th>Telefone</th>

        <th>Ações</th>

    </tr>

 

    <?php foreach ($usuario as $Usuario): ?>

        <tr>

            <td><?php echo e($Usuario["id"]); ?></td>

            <td><?php echo e($Usuario["nome"]); ?></td>

            <td><?php echo e($Usuario["email"]); ?></td>

            <td><?php echo e($Usuario["idade"]); ?></td>

            <td><?php echo e($Usuario["telefone"]); ?></td>

            <td>

                <a href="cadastro.php?acao=editar&id=<?php echo e($Usuario["id"]); ?>">

                    Editar

                </a>

 

                <form method="POST" action="cadastro.php" style="display:inline;"

                      onsubmit="return confirm('Deseja realmente excluir este Usuario?');">

                    <input type="hidden" name="acao" value="excluir">

                    <input type="hidden" name="id" value="<?php echo e($Usuario["id"]); ?>">

                    <button type="submit">Excluir</button>

                </form>

            </td>

        </tr>

    <?php endforeach; ?>

</table>

 

</body>

</html>