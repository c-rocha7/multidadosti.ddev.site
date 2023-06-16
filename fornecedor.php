<?php

require_once __DIR__ . '/DataRequest.php';

$dados_fornecedores = (new DataRequest)->dadosFornecedores();

$dados_fornecedores = json_encode($dados_fornecedores);

echo json_encode($dados_fornecedores);
