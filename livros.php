<?php
include "conexao.php"; // inclui conexão

// Se clicou em cadastrar
if (isset($_POST['cadastrar'])) {

    $titulo = $_POST['titulo'];     // recebe título
    $autor = $_POST['autor'];       // recebe autor

    // Insere autor
    $conn->query("INSERT INTO autores(nome) VALUES('$autor')");

    // Pega último autor inserido
    $id_autor = $conn->insert_id;

    // Insere livro
    $conn->query("INSERT INTO livros(titulo,id_autor) VALUES('$titulo','$id_autor')");
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Cadastrar Livro</h2>

<form method="POST">
<input type="text" name="titulo" placeholder="Título" required>
<input type="text" name="autor" placeholder="Autor" required>
<button name="cadastrar">Cadastrar</button>
</form>

</body>
</html>