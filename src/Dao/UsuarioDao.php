<?php

namespace App\Dao;

use PDO;
use App\Modelo\Usuario;

class UsuarioDao {

    private PDO $bd;

    function __construct($bd) {
        $this->bd = $bd;
    }

    function crea($usuario) {
        
    }

    function modifica($usuario) {
        
    }

    function elimina($nombre) {
        
    }

    function recuperaPorCredencial(string $nombre, string $pwd): ?Usuario {
        $pwdHashed = hash('sha256', $pwd);
        $sql = 'select * from usuarios where usuario=:nombre and pass=:pwdHashed';
        $sth = $this->bd->prepare($sql);
        $sth->execute([":nombre" => $nombre, ":pwdHashed" => $pwdHashed]);
        $sth->setFetchMode(PDO::FETCH_CLASS, Usuario::class);
        $usuario = $sth->fetch();
        return ($usuario ?: null);
    }

}
