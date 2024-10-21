<?php
    include "conexao.php";
    $termo = $_POST['texto_pesquisado'];
    
    // 1º Passo - Comando SQL
    $sql = "SELECT * FROM tb_inventarios WHERE
           descricao LIKE '%$termo%'";

    // 2º Passo - Preparar a conexão
    $consultar = $pdo->prepare($sql);

    // 3º Passo - Tentar executar e mostrar resultados
    try{
        $consultar->execute();
        echo $consultar->rowCount()==0? "Nada encontrado 🫤" : "";
        $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultados as $item){
            $codigo = $item['codigo'];
            $descricao = $item['descricao'];
            $setor = $item['setor'];
            $categoria = $item['categoria'];
            echo "
                  <div class='cartoes'>
                        <h3>Nº $codigo</h3>
                        <p>$descricao</p>
                        <p>Setor: $setor</p>
                        <p>Categoria: $categoria</p>
                  </div>                         
            ";
        }
    }catch(PDOException $erro){
        echo "Falha ao consultar resultados!".$erro->getMessage();
    }
?>