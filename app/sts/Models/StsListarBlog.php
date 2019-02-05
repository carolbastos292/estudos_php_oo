<?php
namespace Sts\Models;
use PDO;

class StsListarBlog{

    public $resultado;

    public function listar(){
      //echo "Pesquisa artigos no BD";
      $listarArtigos = new \Sts\Models\Conn();
      //$listarArtigos->getConn();

      $limit = 10;
      $result_artigos = "SELECT * FROM artigos LIMIT :limit";
      $resultado_artigos = $listarArtigos->getConn()->prepare($result_artigos);
      $resultado_artigos->bindParam(':limit', $limit, \PDO::PARAM_INT);
      $resultado_artigos->execute();
      $resultado_artigos->fetch(PDO::FETCH_ASSOC);
      $this->resultado = $resultado_artigos->fetchAll();

      return $this->resultado;
      //var_dump($this->resultado);

    }
}
 ?>
