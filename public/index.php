<?php

session_start();

require_once '../vendor/autoload.php';
require_once '../src/error_handler.php';

use eftec\bladeone\BladeOne;
use App\BD\BD;
use App\Dao\UsuarioDao;

$views = __DIR__ . '/../views';
$cache = __DIR__ . '/../cache';
define("BLADEONE_MODE", 1); // (optional) 1=forced (test),2=run fast (production), 0=automatic, default value.
$blade = new BladeOne($views, $cache);

$bd = BD::getConexion();

$usuarioDao = new UsuarioDao($bd);

if (isset($_SESSION['usuario'])) {
    $nombre = $_SESSION['usuario'];
    if (filter_has_var(INPUT_GET, 'logout')) {
        session_unset();
        session_destroy();
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
        );
        echo $blade->run("login");
        die;
    } else {
        echo $blade->run("portada", compact('nombre'));
        die;
    }
} else {
    if (filter_has_var(INPUT_POST, 'login')) {
        $nombre = trim(filter_input(INPUT_POST, 'usuario'));
        $nombreErr = strlen($nombre) === 0;
        $pwd = trim(filter_input(INPUT_POST, 'pass'));
        $pwdErr = strlen($pwd) === 0;
        $errorLoginForm = $nombreErr || $pwdErr;
        if (!$errorLoginForm) {
            $usuario = $usuarioDao->recuperaPorCredencial($nombre, $pwd);
            $errorCredenciales = is_null($usuario);
            if (!$errorCredenciales) {
                $_SESSION['usuario'] = $nombre;
                echo $blade->run("portada", compact('nombre'));
                die;
            } else {
                echo $blade->run("login", compact('errorCredenciales'));
                die;
            }
        } else {
            echo $blade->run("login", compact('nombre', 'nombreErr', 'pwd', 'pwdErr'));
            die;
        }
    } else {
        echo $blade->run("login");
        die;
    }
}


    