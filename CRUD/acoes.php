<?php
session_start();
require_once('conexao.php');
//var_dump($_POST);
//exit;
if (isset($_POST['create_tarefa'])) {
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    $data_limite = trim($_POST['data_limite']);
    $status = trim($_POST['status']);


    $sql = "INSERT INTO tarefas (nome, descricao, data_limite, `status`) VALUES('$nome', '$descricao', '$data_limite', '$status')";

    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit();
}

if (isset($_POST['delete_tarefa'])) {
    $tarefaId = mysqli_real_escape_string($conn, $_POST['delete_tarefa']);
    $sql = "DELETE FROM tarefas WHERE id = '$tarefaId'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Usuário com ID {$tarefaId} excluído com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Ops! Não foi possível excluir o usuário";
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit;
}

if (isset($_POST['edit_tarefa'])) {
    $tarefaId = mysqli_real_escape_string($conn, $_POST['id']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $data_limite = mysqli_real_escape_string($conn, $_POST['data_limite']);

    $sql = "UPDATE tarefas SET nome = '{$nome}', descricao = '{$descricao}', data_limite = '{$data_limite}', `status` = '{$status}'";

    
    $sql .= " WHERE id = '{$tarefaId}'";
    var_dump($sql);
    //exit;
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Usuário {$tarefaId} atualizado com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Não foi possível atualizar o usuário {$tarefaId}";
        $_SESSION['type'] = 'error';
    }

    header("Location: index.php");
    exit;
}