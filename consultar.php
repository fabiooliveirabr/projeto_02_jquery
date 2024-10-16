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
                        <h3>Nº <span id='cod_produto'>$codigo</span></h3>
                        <p><span id='desc_produto'>$descricao</span></p>
                        <p>Setor: <span id='setor_produto'>$setor</span></p>
                        <p>Categoria: <span id='cat_produto'>$categoria</span></p>
                  </div>                         
            ";
        }
    }catch(PDOException $erro){
        echo "Falha ao consultar resultados!".$erro->getMessage();
    }
?>