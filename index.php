<?php session_start();
$seguranca = isset($_SESSION['ativa']) ? TRUE : header("location: login.php")
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
// FAZENDO CONEXÃO COM PHPADMIN

$host = "localhost";
$user = "root";
$senha = "";
$database = "login";

$conn = mysqli_connect($host, $user, $senha, $database);
?>
<?php
// Verificar conexão
//if ($conn->connect_error) {
//      die("Conexão falhou: " . $conn->connect_error);
//}
// echo "Conexão bem-sucedida!";
// $conn->close();
?>

<head>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Projeto</title>
</head>

<body>
    <?php if ($seguranca) { ?>

        <!-- Navbar -->
        <header class="menu-principal">
            <div class="header-1">
                <div class="logo">
                    <h2><?php echo 'Coleira Tec'; ?></h2>
                </div>
                <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
                <div class="redes-sociais">
                    <ul>
                        <li><a href=""><img src="img/rss.png"></a></li>
                        <li><a href=""><img src="img/face.png"></a></li>
                        <li><a href=""><img src="img/tw.png"></a></li>
                        <li><a href=""><img src="img/linkedin.png"></a></li>
                    </ul>
                </div>
            </div>

            <div class="header-2">
                <div class="menu">
                    <ul id="nav-list">
                        <li><a href=""><?php echo 'Home'; ?></a></li>
                        <li><a href=""><?php echo 'About us'; ?></a></li>
                        <li><a href=""><?php echo 'Service'; ?></a>
                            <ul>
                                <li><a href="#">Historico</a></li>
                                <li><a href="#">Definir zona de segurança</a></li>
                            </ul>
                        </li>
                        <li><a href=""><?php echo 'Page'; ?></a>
                            <ul>
                                <li><a href="#">Registrar um pet</a></li>
                                <li><a href="#">Os seus pets</a></li>
                                <li><a href="#">led</a></li>
                            </ul>
                        </li>
                        <li><a href=""><?php echo 'Blog'; ?></a></li>
                        <li><a href=""><?php echo 'Contact Us'; ?></a></li>
                        <div class="busca">
                            <input placeholder="Search Something" type="text">
                        </div>
                        <div class="menu-do-usario">
                            <?php echo $_SESSION['nome']; ?></h3>
                            <a href=" logout.php">Logout</a>
                        </div>
                    </ul>
                </div>
            </div>
        </header>

        <div class="col-100">
            <div class="slider-principal">
                <img src="./img/ca7.jpeg" alt="Imagem 1">
                <img src="./img/ca3.jpeg" alt="Imagem 2">
                <img src="./img/ca4.jpeg" alt="Imagem 3">
                <img src="./img/ca6.jpeg" alt="Imagem 4">
            </div>
        </div>

        <div class="col-100">
            <div class="content texto-destaque">
                <h1><?php echo 'sabe onde está <strong>o seu cachorro</strong> com facilidade.'; ?></h1>
                <p><?php echo 'Lorem Ipsum is simply dummy text of the printing and typesetting industry...'; ?></p>

                <div class="col-3 bloco-texto">
                    <img src="img/content-1.png" alt="Content 1">
                    <h3><?php echo 'Lorem Ipsum is simply'; ?></h3>
                    <p><?php echo 'Lorem Ipsum is simply dummy text of the printing...'; ?></p>
                </div>
                <div class="col-3 bloco-texto">
                    <img src="img/content-2.png" alt="Content 2">
                    <h3><?php echo 'Lorem Ipsum is simply'; ?></h3>
                    <p><?php echo 'Lorem Ipsum is simply dummy text of the printing...'; ?></p>
                </div>
                <div class="col-3 bloco-texto">
                    <img src="img/content-3.png" alt="Content 3">
                    <h3><?php echo 'Lorem Ipsum is simply'; ?></h3>
                    <p><?php echo 'Lorem Ipsum is simply dummy text of the printing...'; ?></p>
                </div>
            </div>
        </div>


        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js">
        </script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

        <script>
            function toggleMenu() {
                var menu = document.getElementById("nav-list");
                menu.classList.toggle("active");
            }
        </script>
    <?php } ?>
</body>

</html>