<?php

require_once __DIR__ . '/DataRequest.php';

$dados_usuarios = (new DataRequest)->dadosUsuarios();

$dados_usuarios = json_encode($dados_usuarios);

echo json_encode($dados_usuarios);
