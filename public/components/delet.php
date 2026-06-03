<?php
// Código para deletar um registro

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conectar ao banco de dados
    $conn = new mysqli('localhost', 'root', '', 'nome_do_banco');       

    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Preparar e executar a consulta de exclusão
    $sql = "DELETE FROM nome_da_tabela WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Registro deletado com sucesso.";
    } else {
        echo "Erro ao deletar registro: " . $conn->error;
    }
?>