
// aqui vamos criar o arquivo logout.php, onde o usuário vai poder fazer logout da aplicação
<?php

    session_start();
    session_destroy();
    header("Location: ../index.php");
    exit();

?>