<?php
    //méthode pour ajouter un roles en BDD
    function insertRoles($bdd,string $nom):void{
        try {
            $requete = $bdd->prepare('INSERT INTO roles(nom_roles) 
            VALUE (?)');
            $requete->bindParam(1,$nom,PDO::PARAM_STR);
            $requete->execute();
        } 
        catch (Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    //méthode pour chercher un roles par son nom (gérer les doublons)
    function getRolesByName($bdd,string $nom){
        try {
            $requete = $bdd->prepare('SELECT id_roles,nom_roles FROM roles WHERE
            nom_roles = ?');
            $requete->bindParam(1,$nom,PDO::PARAM_STR);
            $requete->execute();
            return $requete->fetch(PDO::FETCH_ASSOC);
        } 
        catch (Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    //méthode pour chercher un roles par son nom (gérer les doublons)
    function getRolesById($bdd,int $id){
        try {
            $requete = $bdd->prepare('SELECT id_roles FROM roles WHERE
            id_roles = ?');
            $requete->bindParam(1,$id,PDO::PARAM_INT);
            $requete->execute();
            return $requete->fetch(PDO::FETCH_ASSOC);
        } 
        catch (Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    //méthode pour retourner la liste des roles (id_roles, nom_roles)
    function getAllRoles(PDO $bdd):array{
        try {
            $requete = $bdd->prepare('SELECT id_roles,nom_roles FROM roles');
            $requete->execute();
            return $requete->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch (Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    function updateRolesByName(PDO $bdd,int $id,string $nom):void{
        try {
            $requete = $bdd->prepare('UPDATE roles SET nom_roles = ?
            WHERE id_roles = ?');
            $requete->bindParam(1,$nom,PDO::PARAM_STR);
            $requete->bindParam(2,$id,PDO::PARAM_INT);
            $requete->execute();
        } catch (Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }