<?php

$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "paginadelogin";
//conexão com o banco de dados 
$connect = mysqli_connect($host, $db_user, $db_pass, $db_name);

function login($connect)
{
    if (isset($_POST['acessar']) and !empty($_POST['email']) and !empty($_POST['senha'])) {

        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $senha = ($_POST['senha']);
        $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
        $executar = mysqli_query($connect, $query);
        $return = mysqli_fetch_assoc($executar);

        if (!empty($return['email'])) {
            //echo "Bem vindo " . $return['nome'];
            session_start();
            $_SESSION['nome'] = $return['nome'];
            $_SESSION['id'] = $return['id'];
            $_SESSION['ativa'] = true;
            header("location: index.php");
        } else {
            echo "Usáruio não encontrado!";
        }
    }
}
function logout()
{
    session_start();
    session_unset();
    session_destroy();
    header("location: login.php");
}
/* seleciona(busca) no BD apenas um resultado com base no id */
function buscaUnica($connect, $tabela, $id)
{
    $query = "SELECT * FROM $tabela WHERE id=" . (int) $id;;
    $execute = "mysqli_query($connect $query)";
    $result = "mysqli_fetch_assoc($execute)";
    return $result;
}
/* seleciona(busca) no BD todos os resultados com base no id */
function busca($connect, $tabela, $where = 1, $order = "")
{
    if (!empty($order)) {
        $order = "ORDER BY $order";
    }
    $query = "SELECT * FROM $tabela WHERE $where $order";
    $execute = "mysqli_query($connect $query)";
    $results = "mysqli_fetch_all($execute)";
    return $results;
}
