<?php
include "conexao.php";
$codigo = $_POST['cod'];
$desc = $_POST['desc_nova'];
$cat = $_POST['cat_nova'];
$setor = $_POST['setor_novo'];

// 1º Passo - Comando SQL
$sql = "UPDATE tb_inventarios SET descricao='$desc',
       categoria='$cat', setor='$setor'
       WHERE codigo='$codigo'";
// 2º Passo - Preparar conexão
$atualizar = $pdo->prepare($sql);
// 3º Passo - Tentar executar
try{
    $atualizar->execute();
    if($atualizar->rowCount()>=1){
        echo "Atualizado com sucesso!";
    }else{
        echo "Nenhuma alteração foi feita";
    }
}catch(PDOException $erro){
    echo "Falha ao atualizar!".$erro->getMessage();
}

?>