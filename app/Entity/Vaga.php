<?php

namespace App\Entity;

use App\Db\Database;
use \App\Tools\PPrint;
use PDO;

use function PHPSTORM_META\type;

class Vaga
{
    public $id;
    public $titulo;
    public $descricao;
    public $ativo;
    public $data;

    public function __construct($args = [])
    {
        $this->titulo = $args['titulo'] ?? null;
        $this->descricao = $args['descricao'] ?? null;
        $this->ativo = $args['ativo'] ?? null;
    }

    public function cadastrar()
    {
        $this->data = date('Y-m-d H:i:s');
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
            'data' => $this->data
        ]);

        return true;
    }

    public static function getVagas($where = null, $order = null, $limit = null)
    {
        $teste = new Database('vagas');
        $result = $teste->select($where, $order, $limit);
        $resultFetched = $result->fetchAll(PDO::FETCH_CLASS);

        PPrint::pretty_print($resultFetched);

        return (new Database('vagas'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
        return (new Database('vagas'))->select($where, $order, $limit)->fetchAll();
    }
}
