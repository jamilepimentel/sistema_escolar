<?php

// Configuração da conexão com o banco de dados

$host = 'localhost';          // Host do banco de dados
$dbname = 'sistema_escolar';  // Nome do banco
$username = 'root';           // Usuário do banco
$password = '';               // Senha do banco

try {
    // Cria uma nova conexão PDO com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Exibe uma mensagem de erro caso a conexão falhe
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// Função para criar a tabela no banco de dados
function criarTabela($pdo) {
    $sql = "CREATE TABLE IF NOT EXISTS alunos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome_completo VARCHAR(100) NOT NULL,
        data_nascimento DATE NOT NULL,
        cpf VARCHAR(11) NOT NULL UNIQUE
    )";
    $pdo->exec($sql);
}
// Cria a tabela ao carregar o arquivo
criarTabela($pdo);

?>
