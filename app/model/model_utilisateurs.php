<?php
function insertUtilisateur($bdd,string $nom,string $prenom,string $mail,string $password,string $image,int $id_roles):void{
        try {
            $requete = $bdd->prepare('INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur, image_utilisateur,id_roles) 
            VALUE (?,?,?,?,?,?)');
            $requete->bindParam(1,$nom,PDO::PARAM_STR);
            $requete->bindParam(2,$prenom,PDO::PARAM_STR);
            $requete->bindParam(3,$mail,PDO::PARAM_STR);
            $requete->bindParam(4,$password,PDO::PARAM_STR);
            $requete->bindParam(5,$image,PDO::PARAM_STR);
            $requete->bindParam(6,$id_roles,PDO::PARAM_INT);
            $requete->execute();
        } 
        catch (Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }

    function getUtilisateurByMail($bdd,string $mail){
        try {
            $requete = $bdd->prepare('SELECT id_utilisateur,mail_utilisateur FROM utilisateur WHERE
            mail_utilisateur = ?');
            $requete->bindParam(1,$mail,PDO::PARAM_STR);
            $requete->execute();
            return $requete->fetch(PDO::FETCH_ASSOC);
        } 
        catch (Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }