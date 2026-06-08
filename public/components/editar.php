<?php
// Código para editar um registro

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conectar ao banco de dados
    $conn = new mysqli('localhost', 'root', 'root', 'sistema_simples_m1');
    
    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Preparar e executar a consulta de edição
    $sql = "SELECT * FROM usuarios WHERE id = $id";

    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $linha = $resultado->fetch_assoc();
    } else {
        echo "Registro não encontrado.";
        exit;
    }

    

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Editar Usuário</h4>
    <form action="componentes/table.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" value="<?php echo $linha['usuario']; ?>" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="text" name="senha" value="<?php echo $linha['senha']; ?>" required>
        <br>
        <input type="submit" value="Atualizar">
</body>
</html>