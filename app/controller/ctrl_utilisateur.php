<?php

//Méthode qui ajoute un utilisateur en BDD depuis un formulaire
function addUtilisateur($bdd){
    $message = "";
    //test si le bouton est cliqué
    if(isset($_POST["submit"])){
        //test si les champs sont bien remplis
        if(!empty($_POST["nom_utilisateur"]) AND !empty($_POST["prenom_utilisateur"]) AND
        !empty($_POST["mail_utilisateur"]) AND !empty($_POST["password_utilisateur"]) AND
        !empty($_POST["password_confirmation"])){
            //test si les mots de passe correspondent
            if($_POST["password_utilisateur"]===$_POST["password_confirmation"]){
                //nettoyer l'input mail_utilisateur
                $email = cleanInput($_POST["mail_utilisateur"]);
                //test si le compte n'existe pas
                if(!getUtilisateurByMail($bdd, $email)){
                    //nettoyer les entrées utilisateur et hash du password
                    $nom = cleanInput($_POST["nom_utilisateur"]);
                    $prenom = cleanInput($_POST["prenom_utilisateur"]);
                    $password = password_hash(cleanInput($_POST["password_utilisateur"]), PASSWORD_DEFAULT);
                    //test si l'image à été importé 
                    if($_FILES["image_utilisateur"]["tmp_name"] !=""){
                        $image = $_FILES["image_utilisateur"]["name"];
                        $ext = getFileExtension($image);
                        $image = "./public/media/".$nom.$prenom.$ext;
                        //déplacement du fichier image
                        move_uploaded_file($_FILES["image_utilisateur"]["tmp_name"], $image);
                    }
                    //test pas d'image
                    else{
                        $image = '/public/media/image.png';
                    }
                    //ajouter le compte en BDD
                    insertUtilisateur($bdd,$nom,$prenom,$email,$password,$image,1);
                    $message = "Le compte à été ajouté en BDD";
                }
                //test le compte existe
                else{
                    $message = "Les informations d'inscription sont invalides";
                }
            }
            //test les mots de passe ne correspondent pas
            else{
                $message = "Les mots de passe ne sont pas identiques";
            }
        }
        //test si les champs ne sont pas tous remplis
        else{
            $message = "Veuillez remplir tous les champs du formulaire";
        }
    }
    //importer la vue 
    include_once './app/vue/vue_add_utilisateur.php';
}