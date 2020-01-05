<?php
//index.php : Dispatcher / routeur : pour aiguiller
define('WEBROOT', str_replace('index.php', '', $_SERVER['REQUEST_URI']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
//echo "WEBROOT : ".WEBROOT.'<br>';
//echo "ROOT : ".ROOT.'<br>';

require(ROOT.'config/conf.php');
require(ROOT.'core/controller.php');
require(ROOT.'core/model.php');
require(ROOT.'core/session.php');

$chemin = explode("/",WEBROOT);
//echo "<PRE>";
//echo print_r($chemin);
//echo "</PRE>";

define('WEBROOT2', $chemin[1]);
define('WEBROOT3', $chemin[2]);

//echo "get p : ".$_GET["p"]."<br>";

if (isset($_GET["p"])) {
    $params = explode("/",$_GET["p"]);
} else {
    $params=array();
}

//echo "<PRE>";
//echo print_r($params);
//echo "</PRE>";

if (isset($params[0])) {
    $controller=$params[0];
}

if (!isset($controller)) {
    $controller="accueil";
}

//echo "controller : ".$controller.'<br>';
if (isset($params[1])) {
    $action=$params[1];
}

if (!isset($action)) {
    $action="index";
}

//echo "action : ".$action.'<br>';

require ('controllers/'.$controller.'.php');

//instanciation de mon controller
$controller = new $controller();

//vérification de l'existance de l'action demandée
if (method_exists($controller,$action)){
    //$controller->$action();
        unset($params[0]);
        unset($params[1]);
    // Appel de la méthode $foo->bar() avec 2 arguments
    call_user_func_array(array($controller, $action), $params);
 } else {
    echo "erreur 404";
}

?>