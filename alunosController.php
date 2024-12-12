<?php
include '../database/connection.php'; // Inclui a conexão com o banco

// Função para cadastrar um novo aluno
function cadastrarAluno($nome, $dataNascimento, $cpf) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("INSERT INTO alunos (nome_completo, data_nascimento, cpf) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $dataNascimento, $cpf]);
    } catch (PDOException $e) {
        return "Erro: " . $e->getMessage();
    }
    return "Aluno cadastrado com sucesso!";
}

// Inserir dois cadastros iniciais ao carregar o script
try {
    cadastrarAluno("João Silva", "2005-03-15", "12345678901");
    cadastrarAluno("Maria Oliveira", "2007-07-22", "98765432100");
} catch (Exception $e) {
    echo "Erro ao inserir cadastros iniciais: " . $e->getMessage();
}

// Função para listar todos os alunos
function listarAlunos() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM alunos");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para alterar dados de um aluno existente
function alterarAluno($id, $nome, $dataNascimento, $cpf) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("UPDATE alunos SET nome_completo = ?, data_nascimento = ?, cpf = ? WHERE id = ?");
        $stmt->execute([$nome, $dataNascimento, $cpf, $id]);
    } catch (PDOException $e) {
        return "Erro: " . $e->getMessage();
    }
    return "Dados do aluno atualizados com sucesso!";
}

// Função para remover um aluno
function removerAluno($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = ?");
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        return "Erro: " . $e->getMessage();
    }
    return "Aluno removido com sucesso!";
}
?>
