
<?php

if (isset($_FILES['Foto_candidato']) && $_FILES['Foto_candidato']['error'] === 0) {

    // Caminho da pasta onde o arquivo será salvo
    $pasta = __DIR__ . "/uploads/candidatos/";

    // Cria a pasta se não existir
    if (!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }

    // Extensão real do arquivo
    $extensao = pathinfo($_FILES['Foto_candidato']['name'], PATHINFO_EXTENSION);

    // Nome único para evitar arquivos repetidos
    $nomeArquivo = uniqid("foto_", true) . "." . $extensao;

    // Caminho completo onde o arquivo será salvo
    $caminhoFinal = $pasta . $nomeArquivo;

    // Salva o arquivo
    if (move_uploaded_file($_FILES['Foto_candidato']['tmp_name'], $caminhoFinal)) {

        // Caminho relativo para salvar no banco (NÃO salve caminho absoluto)
        $repositorioDB = "uploads/candidatos/" . $nomeArquivo;

        echo "Arquivo salvo em: $caminhoFinal <br>";
        echo "Caminho para salvar no banco: $repositorioDB <br>";

        // Agora você pode salvar $repositorioDB no banco
        // Exemplo:
        /*
            $sql = "INSERT INTO candidatos (foto_path) VALUES (?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$repositorioDB]);
        */

    } else {
        echo "Erro ao mover o arquivo.";
    }

} else {
    echo "Nenhum arquivo enviado ou erro no upload.";
}
?>