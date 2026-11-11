<?php
$host = "localhost";
$port = "5432";
$banco = "projeto_crud";
$usuario = "postgres";
$senha = "postgre";
$dsn = "pgsql:host=$host;port=$port;dbname=$banco";
try {
    $pdo = new PDO($dsn, $usuario, $senha);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Não foi possível conectar ao banco de dados.");
}
$sql = "SELECT id, titulo, descricao, status FROM tarefas ORDER BY id";

$stmt = $pdo->query($sql);

$tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
</head>
<body>

    <h1>Minhas Tarefas</h1>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($tarefas as $tarefa): ?>
    <tr>
        <td><?= htmlspecialchars($tarefa['id']) ?></td>
        <td><?= htmlspecialchars($tarefa['titulo']) ?></td>
        <td><?= htmlspecialchars($tarefa['descricao']) ?></td>
        <td><?= htmlspecialchars($tarefa['status']) ?></td>
    </tr>
<?php endforeach; ?>
    </tbody>
</table>
</body>
</html>