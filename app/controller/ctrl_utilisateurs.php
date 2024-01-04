<?php
//fonction pour gérer l'ajout des roles en BDD
function addUtilisateur($bdd)
{
    //stocker les messages d'erreur
    $message = "";
    //test si le bouton est cliqué
    if (isset($_POST["submit"])) {
        //tester si les champs sont remplis
        if (!empty($_POST["nom_utilisateur"]) AND !empty($_POST["prenom_utilisateur"]) AND !empty($_POST["mail_utilisateur"]) AND !empty($_POST["password_utilisateur"]) AND !empty($_POST["password_verification"])) {
            if($_POST["password_utilisateur"]===$_POST["password_verification"]){
            $hash = password_hash($_POST["password_utilisateur"],PASSWORD_DEFAULT);
            //nettoyer nom_roles
            $nom = cleanInput($_POST["nom_utilisateur"]);
            $prenom = cleanInput($_POST["prenom_utilisateur"]);
            $mail = cleanInput($_POST["mail_utilisateur"]);
            $password = cleanInput($_POST["password_utilisateur"]);

            insertUtilisateur($bdd,$nom,$prenom,$mail,$password,$_POST["image_utilisateur"]);
    }
    
            //test si le roles n'existe pas
//            if (empty(getRolesByName($bdd, $nom))) {
                //ajouter le roles en BDD
//                addRoles($bdd, $nom);
//                $message = "Le roles " . $nom . " a été ajouté en BDD";
//            }
            //test si le roles existe déja en BDD
//            else {
//                $message = "Le roles " . $nom . " existe déja en BDD";
//            }
//        }
        //test si nom_roles est vide
//        else {
//            $message = "Veuillez remplir le champs de formulaire";
//        }
        }
    }
    //appel de la vue
    include_once './app/vue/vue_add_utilisateur.php';
}
