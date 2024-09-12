<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Grupo
{
    /** 
     * Identificador Único do chamado 
     * @var integer
     */
    public $id_grupo;

    /** 
     * Data de abertura do chamado 
     * @var string
     */
    public $nome;

   
    /** 
     * Método responsável por cadastrar um novo chamado no banco de dados 
     * @return boolean
     */

    /**
     * Método responsável por realizar o upload da imagem e salvar a referência no objeto
     * @param array $imagemDados Dados da imagem enviada via upload
     * @return boolean
     */


     public static function getGrupo()
     {
         $banco = new Database("vw_grupo_estrutura");
         $dados = $banco->select()->fetchAll(); // Remove o filtro de ordenação
         return $dados;
     }
     

    


}


