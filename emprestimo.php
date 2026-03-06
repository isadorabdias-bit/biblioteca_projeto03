<?php
include "conexao.php";

// Quando clicar emprestar
if(isset($_POST['emprestar'])){

    $livro = $_POST['livro'];
    $leitor = $_POST['leitor'];

    // Conta quantos livros o leitor já pegou e não devolveu
    $verifica = $conn->query("SELECT COUNT(*) as total 
                              FROM emprestimos 
                              WHERE id_leitor='$leitor' 
                              AND devolvido=0");

    $dados = $verifica->fetch_assoc();

    if($dados['total'] >= 3){
        echo "Limite de livros atingido!";
    } else {

        $data_emprestimo = date("Y-m-d"); // hoje
        $data_devolucao = date("Y-m-d", strtotime("+7 days")); // +7 dias

        $conn->query("INSERT INTO emprestimos
        (id_livro,id_leitor,data_emprestimo,data_devolucao)
        VALUES('$livro','$leitor','$data_emprestimo','$data_devolucao')");
    }
}
?>

<form method="POST">
<input type="number" name="livro" placeholder="ID Livro">
<input type="number" name="leitor" placeholder="ID Leitor">
<button name="emprestar">Emprestar</button>
</form>