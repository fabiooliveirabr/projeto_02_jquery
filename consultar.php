<?php
    include "conexao.php";
    // 1º Passo - Comando SQL
    $sql = "SELECT * FROM tb_inventarios";

    // 2º Passo - Preparar a conexão
    $consultar = $pdo->prepare($sql);

    // 3º Passo - Tentar executar e mostrar resultados
    try{
        $consultar->execute();
        $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultados as $item){
            $codigo = $item['codigo'];
            $descricao = $item['descricao'];
            $setor = $item['setor'];
            $categoria = $item['categoria'];
            echo "
                  <div class='cartoes'>
                        <h3>Nº <span class='cod_produto'>$codigo</span></h3>
                        <p><span class='desc_produto'>$descricao</span></p>
                        <p>Setor: <span class='setor_produto'>$setor</span></p>
                        <p>Categoria: <span class='cat_produto'>$categoria</span></p>
                  </div>                         
            ";
        }
    }catch(PDOException $erro){
        echo "Falha ao consultar resultados!".$erro->getMessage();
    }
?>