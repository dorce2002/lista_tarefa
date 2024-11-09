<?php
session_start();
require 'conexao.php';

$sql = "SELECT * FROM tarefas";
$tarefas = mysqli_query($conn, $sql);
//var_dump($tarefas);


?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php include('navbars/navbar.php'); ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Lista de Tarefas <i class="bi bi-clipboard"></i>
                            <a href="tarefa-create.php" class="btn btn-primary float-end">Adicionar Tarefa</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php include('mensagem.php') ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Data Limite</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tarefas as $tarefa): ?>
                                    <tr>
                                        <td><?php echo $tarefa['id']; ?></td>
                                        <td><?php echo $tarefa['nome']; ?></td>
                                        <td><?php echo $tarefa['descricao']; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($tarefa['data_limite'])); ?></td>
                                        <td>
                                           <select id="status">
                                                <option value="Não realizado" class="btn btn-secondary btn-sm" <?= $tarefa['status'] == "Não realizado" ? 'selected' : ''?>>Não Realizado</option>
                                                <option value="Desenvolvimento" class="btn btn-warning btn-sm" <?= $tarefa['status'] == "Desenvolvimento" ? 'selected' : ''?>>Desenvolvimento</option>
                                                <option value="Concluido" class="btn btn-success btn-sm"        <?= $tarefa['status'] == "Concluido" ? 'selected' : ''?>>Concluido</option>
                                            </select>
                                            <input type="text" name="status" style="display:none;" />
                                        </td>
                                        <td>
                                            <a href="tarefa-edit.php?id=<?= $tarefa['id'] ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i>Editar</a>
                                            <form action="acoes.php" method="POST" class="d-inline">
                                                <button onclick="return confirm('Tem certeza que deseja excluir?')" name="delete_tarefa" type="submit" value="<?= $tarefa['id'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i>Excluir</button>

                                            </form>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>