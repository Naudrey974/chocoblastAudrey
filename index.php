<?php
//import de la configuration BDD
include_once './app/utils/bddConnect.php';
//import des fonctions utilitaires
include_once './app/utils/utilitaire.php';
//importer les model (requête SQL)
include_once './app/model/model_roles.php';
include_once './app/model/model_utilisateur.php';
//imports des controllers
include_once './app/controller/ctrl_page.php';
include_once './app/controller/ctrl_roles.php';
include_once './app/controller/ctrl_utilisateur.php';
//utilisation de session_start(pour gérer la connexion au serveur)
session_start();
//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test si l'url posséde une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';
switch ($path) {
    case '/mvccyber/':
        home();
        break;
    case '/mvccyber/exemple':
        exemple();
        break;
    case '/mvccyber/roles/add':
        addRoles($bdd);
        break;
    case '/mvccyber/roles/all':
        showAllRoles($bdd);
        break;
    case '/mvccyber/roles/update/id':
        updateRoles($bdd);
        break;
    case '/mvccyber/utilisateur/add':
        addUtilisateur($bdd);
        break;
    default:
        error();
        break;
}
