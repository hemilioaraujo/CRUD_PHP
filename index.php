<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Vaga;
use App\Tools\PPrint;

$vagas = Vaga::getVagas();
PPrint::pretty_print($vagas);

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';