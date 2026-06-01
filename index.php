<?php
    // Inicia a sessão para armazenar dados do usuário logado
    session_start();

    // Inclui o arquivo de conexão com o banco de dados
    include("infra/db/connect.php");

    // Verifica se o formulário foi enviado pelo método POST
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        // Recebe os dados digitados no formulário
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        
        // Consulta no banco para verificar se existe um usuário com esse login e senha
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

        // Executa a consulta
        $resultado = $conn->query($sql);

        // Verifica se encontrou algum registro
        if ($resultado->num_rows > 0){

            // Armazena o usuário na sessão
            $_SESSION["usuario"] = $usuario;

            // Redireciona para a página inicial
            header("Location: public/home.php");
            exit();

        }else{

            // Mensagem exibida caso login ou senha estejam incorretos
            $erro = "Usuário ou senha inválidos!";
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <!-- Título da página -->
    <h1>Sistema de Login Simples</h1>

    <!-- Formulário de login -->
    <form method="POST">

        <!-- Campo de usuário -->
        <label>Usuário:</label>
        <input type="text" name="usuario">
        <br>

        <!-- Campo de senha -->
        <label>Senha:</label>
        <input type="password" name="senha">
        <br>

        <?php
        
            // Verifica se a variável $erro existe
            if(isset($erro)){
                
                // Exibe a mensagem de erro na tela
                echo $erro;
            };

            
        ?>

        <br>

        //butão para enviar o formulário
        <button type="submit">Entrar</button>

    </form>

</body>
</html>