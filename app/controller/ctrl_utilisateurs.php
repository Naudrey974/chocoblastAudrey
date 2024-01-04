<?php
//fonction pour gérer l'ajout des roles en BDD
function addUtilisateur($bdd){
    //stocker les messages d'erreur
    $message = "";
    //test si le bouton est cliqué
    if (isset($_POST["submit"])) {
        //tester si les champs sont remplis
        if (!empty($_POST["nom_utilisateur"]) AND !empty($_POST["prenom_utilisateur"]) AND !empty($_POST["mail_utilisateur"]) AND !empty($_POST["password_utilisateur"]) AND !empty($_POST["password_verification"])) {
            //tester la vérif du MP
            if($_POST["password_utilisateur"]===$_POST["password_verification"]){
                //hash du MP
                $hash = password_hash($_POST["password_utilisateur"],PASSWORD_DEFAULT);
                //nettoyer les inputs
                $nom = cleanInput($_POST["nom_utilisateur"]);
                $prenom = cleanInput($_POST["prenom_utilisateur"]);
                $mail = cleanInput($_POST["mail_utilisateur"]);
                $password = cleanInput($_POST["password_utilisateur"]);
                //test si l'utilisateur n'existe pas
                if (empty(getUtilisateurByMail($bdd, $mail))) {
                    //ajouter l'utilisateur en BDD
                    insertUtilisateur($bdd,$nom,$prenom,$mail, $password,$_POST["image_utilisateur"],$_POST["id_roles"]);
                    $message = "L'utilisateur " . $nom . " a été ajouté en BDD";
                    }
                        else{
                        $message = "L'utilisateur " . $nom . " existe déja en BDD";
                        }      
                    }
                    else {
                    //test si les champs sont vides
                    $message = "Veuillez remplir le champs de formulaire";
                }
            }
        //appel de la vue
        include_once './app/vue/vue_add_utilisateur.php';
    }
}