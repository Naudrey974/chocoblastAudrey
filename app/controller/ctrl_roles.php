<?php
//fonction pour gérer l'ajout des roles en BDD
function addRoles($bdd)
{
    //stocker les messages d'erreur
    $message = "";
    //test si le bouton est cliqué
    if (isset($_POST["submit"])) {
        //tester si le champs nom_roles est rempli
        if (!empty($_POST["nom_roles"])) {
            //nettoyer nom_roles
            $nom = cleanInput($_POST["nom_roles"]);
            //test si le roles n'existe pas
            if (empty(getRolesByName($bdd, $nom))) {
                //ajouter le roles en BDD
                addRoles($bdd, $nom);
                $message = "Le roles " . $nom . " a été ajouté en BDD";
            }
            //test si le roles existe déja en BDD
            else {
                $message = "Le roles " . $nom . " existe déja en BDD";
            }
        }
        //test si nom_roles est vide
        else {
            $message = "Veuillez remplir le champs de formulaire";
        }
    }
    //appel de la vue
    include_once './app/vue/vue_add_roles.php';
}
function showAllRoles($bdd)
{
    $message = "";
    //récupération de la liste des rôles
    $roles = getAllRoles($bdd);
    //test si la liste est vide
    if (!$roles) {
        $message = "Il n'y à pas roles dans la BDD";
    }
    //importer la vue
    include_once './app/vue/vue_get_all_roles.php';
}
function updateRoles($bdd)
{
    //nettoyer id
    $id = cleanInput($_GET["id"]);
    //test si le roles existe (par son id)
    if (empty(getRolesById($bdd, $id))) {
        header('location: /mvccyber/roles/all');
    }
    //variable message erreur
    $message = "";
    //tester si le bouton est cliqué
    if (isset($_POST["submit"])) {
        //tester si le champs nom_roles est rempli
        if (!empty($_POST["nom_roles"])) {
            //nettoyer nom_roles
            $nom = cleanInput($_POST["nom_roles"]);
            //test si le roles n'existe pas
            if (empty(getRolesByName($bdd, $nom))) {
                //modifier le roles en BDD
                updateRolesByName($bdd, $id, $nom);
                $message = "Le roles " . $nom . " a été modifié en BDD";
                //redirection quand modifié 
                header("Refresh:1; url=/mvccyber/roles/all");
            }
            //test si le roles existe déja en BDD
            else {
                $message = "Le roles " . $nom . " existe déja en BDD";
            }
        }
        //test si nom_roles est vide
        else {
            $message = "Veuillez remplir le champs de formulaire";
        }
    }
    //importer la vue
    include_once './app/vue/vue_update_roles.php';
}
