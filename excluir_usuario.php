<?php


include('conecta.php');

if ($conn) {
    if (isset($_GET['IdUser'])) {
        $IdUser = mysqli_real_escape_string($conn, $_GET['IdUser']);
        
        $query = "DELETE FROM user WHERE IdUser = '$IdUser'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo 'Usuário excluído com sucesso.';
        } else {
            echo 'Erro ao excluir o usuário: ' . mysqli_error($conn);
        }
    } else {
        echo 'ID do usuário não fornecido.';
    }
} else {
    echo 'Erro ao conectar ao banco de dados.';
}
?>
