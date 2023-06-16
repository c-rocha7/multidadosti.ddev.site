<?php

require_once __DIR__ . '/DataRequest.php';

$dados_clientes = (new DataRequest)->dadosClientes();

$dados_clientes = json_encode($dados_clientes);

echo json_encode($dados_clientes);
