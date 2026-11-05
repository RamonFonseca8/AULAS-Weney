<?php   -- Abre o bloco de código PHP. Tudo que estiver dentro desse bloco será interpretado pelo PHP no servidor.
$host = "localhost"; -- "localhost"; Cria a variável host. localhost indica que o MySQL está instalado na mesma máquina que o PHP.
$banco = "etcescola"; -- Nome do banco 
$usuario = "root";   --  Usuário do banco
$senha = "";   
try {  -- Inicia um bloco de tentativa. O PHP tentará executar o código dentro dele. Se ocorrer uma falha de conexão, ela poderá ser tratada no catch.
    $pdo = new PDO(
        "mysql:host=$host;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    die("Erro ao conectar ao banco de dados!");
}
?>
