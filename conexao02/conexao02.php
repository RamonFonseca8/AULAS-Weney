<?php
$host = "localhost"; 
$banco = "etcescola"; 
$usuario = "root";  
$senha = "";  

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION  
    );
    echo "Conectado ao banco com sucesso!";

} catch (PDOException $erro) {
    die("Erro na conexão: ". $erro->getMenssage ());
}

?>