<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags($_POST["nome"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["mensagem"]);

    $to = "tecnologiaemfoco2024@gmail.com";
    $subject = "Nova mensagem de contato";
    $body = "Nome: $name\n";
    $body .= "E-mail: $email\n";
    $body .= "Mensagem:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('E-mail enviado com sucesso!');window.location.href='formulario.html';</script>";
    } else {
        echo "<script>alert('Erro ao enviar o e-mail.');window.history.back();</script>";
    }
} else {
    echo "<script>alert('Acesso inválido!');window.history.back();</script>";
}
?>
