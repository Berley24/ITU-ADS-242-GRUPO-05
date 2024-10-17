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
        $senha = sha1($_POST['senha']);
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
/*inserir novos usuários */
function inserirUsuarios($connect)
{
    if ((isset($_POST['cadastrar']) && !empty($_POST['email']) && !empty($_POST['senha']))) {
        $erros = array();
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
        $senha = sha1($_POST['senha']);

        // Verificar se o campo 'repetesenha' está definido
        if (isset($_POST['repetesenha'])) {
            if ($_POST['senha'] != $_POST['repetesenha']) {
                $erros[] = "Senhas não conferem!";
            }
        } else {
            $erros[] = "Campo de confirmação de senha não preenchido!";
        }

        $queryEmail = "SELECT email FROM usuarios WHERE email = '$email'";
        $buscaEmail = mysqli_query($connect, $queryEmail);
        $verifica = mysqli_num_rows($buscaEmail);

        // Verificar se o e-mail já está cadastrado
        if (!empty($verifica)) {
            $erros[] = "E-mail já cadastrado!";
        }

        if (empty($erros)) {
            $query = "INSERT INTO usuarios (nome, email, senha, data_cadastro) VALUES ('$nome', '$email', '$senha', NOW())";
            $executar = mysqli_query($connect, $query);

            if ($executar) {
                echo "Usuário inserido com sucesso.";
            } else {
                echo "Erro ao inserir usuário.";
            }
        } else {
            // Exibir os erros
            foreach ($erros as $erro) {
                echo "<p>$erro</p>";
            }
        }
    }
}
