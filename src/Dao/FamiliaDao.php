<?php
namespace App\Dao;

use PDO;
use App\Modelo\Familia;

class FamiliaDao {

    private PDO $bd;

    function __construct($bd) {
        $this->bd = $bd;
    }

    function crea(Familia $familia) {
        
    }

    function modifica(Familia $familia) {
        
    }

    function elimina(int $id) {
        
    }

    function recuperaPorId(int $id) {
        
    }

    function recuperaTodo(): array {
        $this->bd->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
        $sql = "select * from familias order by nombre";
        $sth = $this->bd->prepare($sql);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Familia::class);
        $familias = $sth->fetchAll();
        return $familias;
    }

}
