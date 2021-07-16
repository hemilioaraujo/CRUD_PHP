<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Vaga;
use \App\Tools\PPrint;

if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {
    $obVaga = new Vaga($_POST);
    $obVaga->cadastrar();
    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
