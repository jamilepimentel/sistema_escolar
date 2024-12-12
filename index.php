<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escolar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">

</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Sistema Escolar</h1>
    <h3 class="text-center">Cadastro de Alunos</h3>

    <!-- Formulário de Cadastro -->
    <form method="POST" action="../controllers/alunosController.php">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="dataNascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" maxlength="11" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <!-- Tabela de Alunos -->
    <h3 class="mt-5">Lista de Alunos</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../controllers/alunosController.php';
            $alunos = listarAlunos();
            foreach ($alunos as $aluno) {
                echo "<tr>
                    <td>{$aluno['id']}</td>
                    <td>{$aluno['nome_completo']}</td>
                    <td>{$aluno['data_nascimento']}</td>
                    <td>{$aluno['cpf']}</td>
        <td>
            <a href='edit.php?id={$aluno['id']}' class='btn btn-warning btn-sm'>Editar</a>
            <a href='../controllers/alunosController.php?delete={$aluno['id']}' class='btn btn-danger btn-sm'>Remover</a>
        </td>
      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>