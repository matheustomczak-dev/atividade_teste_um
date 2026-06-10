<?php
// Código para deletar um registro

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conectar ao banco de dados
    $conn = new mysqli('localhost', 'root', 'root', 'sistema_simples_m1');
    
    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    //confirmar exclusão
    if (!isset($_GET['confirm']) || $_GET['confirm'] !== 'yes') {
        echo "Tem certeza que deseja excluir este registro? <a href='delet.php?id=$id&confirm=yes'>Sim</a> | <a href='index.php'>Não</a>";
        exit;
    }


    // Preparar e executar a consulta de exclusão
    $sql = "DELETE FROM usuarios WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro excluído com sucesso.";
    } else {
        echo "Erro ao excluir registro: " . $conn->error;
    }

    //voltar para pagina de edição
    echo "<br><a href='../home.php'>Voltar</a>";

    $conn->close();
}
?>