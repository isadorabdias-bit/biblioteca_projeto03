<?php
include "conexao.php";

if(isset($_POST['devolver'])){

    $id = $_POST['id'];

    // Busca empréstimo
    $sql = $conn->query("SELECT * FROM emprestimos WHERE id='$id'");
    $dados = $sql->fetch_assoc();

    $hoje = date("Y-m-d");

    $multa = 0;

    // Se atrasou
    if($hoje > $dados['data_devolucao']){

        $dias = (strtotime($hoje) - strtotime($dados['data_devolucao']))/86400;

        $multa = $dias * 2; // 2 reais por dia
    }

    // Marca como devolvido
    $conn->query("UPDATE emprestimos SET devolvido=1 WHERE id='$id'");

    echo "Multa: R$".$multa;
}
?>

<form method="POST">
<input type="number" name="id" placeholder="ID Empréstimo">
<button name="devolver">Devolver</button>
</form>