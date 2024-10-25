<?php
// Iniciar a sessão
session_start();

// Verifica se o cliente está logado e se os dados existem na sessão
$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$celular = isset($_SESSION['celular']) ? $_SESSION['celular'] : '';

// Processar o envio do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $mensagem = $_POST['mensagem'];

    // Aqui você pode implementar a lógica de envio, como enviar um e-mail
    $to = "seuemail@exemplo.com";
    $subject = "Nova mensagem de contato";
    $body = "Nome: $nome\nEmail: $email\nCelular: $celular\n\nMensagem:\n$mensagem";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Falha ao enviar mensagem.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Contato</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <div class="container">
        <h1>Contatos</h1>
        <p>E-mail: <a href="mailto:seuemail@exemplo.com">berleypierre@gmail.com</a></p>
        <p>WhatsApp: <a href="https://wa.me/seunumerowhatsapp">Clique aqui</a></p>
        <p>Telegram: <a href="https://t.me/seutelegram">Clique aqui</a></p>

        <!-- Formulário -->
        <form method="post" action="contato.php" class="contact-form">
            <input type="text" name="nome" placeholder="Nome e Eobrenome" value="<?php echo $nome; ?>" required>
            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
            <input type="tel" name="celular" placeholder="Celular" value="<?php echo $celular; ?>" required>
            <textarea name="mensagem" placeholder="Sua Mensagem" rows="5" required></textarea>
            <button type="submit">Enviar</button>
        </form>
    </div>

    <div class="footer">
        <p>
            <strong>Nosso endereço:</strong>
        <p>R. do Patrocínio, 716 - Centro, Itu - SP, 13300-200
        </p>
        </p>
        <p><a href="https://maps.app.goo.gl/gJKECiZVNtPXVvqS8" target="_blank">Ver no Google Maps</a></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3044.887292443401!2d-47.3018974255537!3d-23.267856579002544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf5004d1480d23%3A0x2495bd197b4c49cf!2sCEUNSP%20-%20ITU%20ll!5e1!3m2!1spt-BR!2sbr!4v1729635374268!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

</body>

</html>