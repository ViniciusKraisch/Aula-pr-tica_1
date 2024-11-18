<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "pratica_1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_POST['create'])) {
    $nome_colaborador = $_POST['nome_colaborador'];
    $nome_cliente = $_POST['nome_cliente'];
    $chamado = $_POST['chamado'];
 
    $sql = "INSERT INTO cadastro (nome_colaborador, nome_cliente, chamado) VALUES ('$nome_colaborador', 
    '$nome_cliente', '$chamado')";

if ($conn->query($sql) === TRUE) {
    echo "Novo cadastro feito com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome_colaborador = $_POST['nome_colaborador'];
    $nome_cliente = $_POST['nome_cliente'];
    $chamado = $_POST['chamado'];
   

    $sql = "UPDATE cadastro SET nome_colaborador='$nome_colaborador', nome_cliente='$nome_cliente'
    , chamado='$chamado', WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro atualizado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM cadastro WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "cadastro excluído com sucesso!";
    } else {
        echo "Erro ao excluir o cadastro: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM cadastro");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD - Tela de Cadastro</title>
</head>
<body>

<h2>Adicionar Cadastro</h2>
<form method="POST" action="">
    Nome do Colaborador: <input type="text" name="nome_colaborador" required><br><br>
    Nome do Cliente: <input type="text" name="nome_cliente" required><br><br>
    Chamado: <input type="number" name="chamado" required><br><br>
    <input type="submit" name="create" value="Adicionar Pedido">
</form>

<h2>Lista de Cadastros</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome do Cliente</th>
        <th>Email</th>
        <th>Telefone</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['nome_colaborador']; ?></td>
        <td><?php echo $row['nome_cliente']; ?></td>
        <td><?php echo $row['chamado']; ?></td>
        <td>
            <a href="index.php?delete=<?php echo $row['id']; ?>">Excluir</a>
            <a href="index.php?update=<?php echo $row['id']; ?>">Update</a>
        </td>
    </tr>
    <?php } ?>
    </table>

    <h2>Atualizar Cadastro</h2>

<form method="POST" action="">
    ID do Pedido: <input type="number" name="id" required><br><br>
    Nome do Cliente: <input type="text" name="nome_cliente" required><br><br>
    Email do Cliente: <input type="text" name="email_cliente" required><br><br>
    Telefone do Cliente: <input type="number" name="telefone_cliente" required><br><br>
    <input type="submit" name="update" value="Adicionar Pedido">
</form>


</body>