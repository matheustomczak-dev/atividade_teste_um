<?php
// Código para deletar um registro

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conectar ao banco de dados
    $conn = new mysqli('localhost', 'matheus_tomczak_2026', 'root', '', 'atividade_teste_um');
    
    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Preparar e executar a consulta de exclusão
    $sql = "DELETE FROM usuarios WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro excluído com sucesso.";
    } else {
        echo "Erro ao excluir registro: " . $conn->error;
    }

    $conn->close();
}
?>