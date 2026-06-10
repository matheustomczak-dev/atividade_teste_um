<?php
// Código para editar um registro
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
include("../../infra/db/connect.php");

$id = $_GET['id'];


    // Preparar e executar a consulta de edição
    $sql = "SELECT * FROM usuarios WHERE id = $id";

    $resultado = $conn->query($sql);
    $usuario = $resultado->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $sql = "UPDATE usuarios SET usuario='$usuario', senha='$senha' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Registro atualizado com sucesso.";
            header("Location: ../home.php");
            exit;
        } else {
            echo "Erro ao atualizar registro: " . $conn->error;
        }

    

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
</head>
<body>
    <h4>Editar Usuário</h4>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" value="<?php echo $usuario['usuario']; ?>" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="text" name="senha" value="<?php echo $usuario['senha']; ?>" required>
        <br>
        <input type="submit" value="Atualizar">

    //voltar para pagina de edição 
    <a href="index.php">Volta</a>
    </form>
</body>
</html>