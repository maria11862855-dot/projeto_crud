<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);

    $mensagem = filter_input(INPUT_POST, "mensagem", FILTER_SANITIZE_SPECIAL_CHARS);

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Contato</title>
</head>
<body>

    <h1>Formulário de Contato</h1>
<form method="POST" action="contato.php">

    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>

    <br><br>

    <label for="mensagem">Mensagem:</label>
    <textarea name="mensagem" id="mensagem" required></textarea>

    <br><br>

    <button type="submit">Enviar</button>

</form>
<?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>

    <h2>Dados recebidos:</h2>

    <p>Nome: <?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?></p>

    <p>Mensagem: <?= htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8') ?></p>

<?php endif; ?>
</body>
</html>