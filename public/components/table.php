<h4>Usuários Cadastrados</h4>


// aqui vamos criar uma tabela para mostrar os usuários cadastrados no banco de dados
<table border="1" cellpadding="3">

    <tr>
        <th>ID</th>
        <th>Usuário</th>
        <th>Senha</th>
        <th>Excluir</th>
        <th>Editar</th>
    </tr>
    // aqui vamos usar o PHP para buscar os usuários cadastrados no banco de dados e mostrar na tabela
    <?php
    // aqui vamos criar a conexão com o banco de dados
    $sqlTodosUsuarios = "SELECT * FROM usuarios";

    $resultadoTodosUsuarios = $conn->query($sqlTodosUsuarios);

    while($linha = $resultadoTodosUsuarios->fetch_assoc()){

    //mostrar os usuários cadastrados na tabela
        echo "  <tr>
                    <td>". $linha['id'] . "</td>
                    <td>". $linha['usuario'] . "</td>
                    <td>". $linha['senha'] . "</td>
                    <td><a href='delet.php?id=" . $linha['id'] . "'>Excluir</a></td>
                    <td><a href='edit.php?id=" . $linha['id'] . "'>Editar</a></td>
                </tr>
        ";

    }
    
    ?>

    


</table>