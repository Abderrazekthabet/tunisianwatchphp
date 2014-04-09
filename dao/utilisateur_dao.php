<?php

include_once("connection/connection.php");
include_once("entity/UtilisateurEntity.php");

class utilisateurDao {

    function __construct() {
        
    }

    function insertUser(UtilisateurEntity $user) {
        $nom = $user->getNom();
        $prenom = $user->getPrenom();
        $sexe = $user->getSexe();
        $adress = $user->getAdress();
        $login = $user->getLogin();
        $mdp = $user->getMdp();
        $mail = $user->getMail();
        $type = $user->getType();

        if ($user->getPhoto() != "") {
            $photo = $user->getPhoto();
        } else {
            $photo = 'null';
        }

        if ($user->getDatenaissance() != "")
            $datenaissance = $user->getDatenaissance();
        else
            $datenaissance = 'null';

        //préparataion (dans une variable) de la requête SQL
        $requete = "insert into utilisateur (nom,prenom,sexe,adress,login,mdp,mail,type,datenaissance,photo) "
                . "values ('$nom', '$prenom', '$sexe','$adress', '$login', '$mdp', '$mail', '$type', '$datenaissance','$photo');";


        // la fonction mysql_query permet d'exécuter la requête préparée
        echo "$requete";
        if (mysql_query($requete) or die(mysql_error())) {
            echo "insertion réussie";
        } else
            echo "erreur lors de l'insertion";
    }

    function updateUser($id, UtilisateurEntity $user) {
        $nom = $user->getNom();
        $prenom = $user->getPrenom();
        $sexe = $user->getSexe();
        $adress = $user->getAdress();
        $login = $user->getLogin();
        $mdp = $user->getMdp();
        $mail = $user->getMail();
        $type = $user->getType();
        $photo = $user->getPhoto();
        $datenaissance = $user->getDatenaissance();
        $requete = "UPDATE `utilisateur` SET photo = '$photo' , `nom` = '$nom', `prenom` = '$prenom', `sexe` = '$sexe',`adress` = '$adress',`login` = '$login',`mdp` = '$mdp',`mail` = '$mail',`type` = '$type',`datenaissance` = '$datenaissance' WHERE `id` ='$id';";

        if (mysql_query($requete)) {
            echo "Update réussie";
        } else
            echo "erreur lors de la mise à jour";
    }

    function deleteUser($id) {

        $requete = " delete from utilisateur where id = " . $id;

        if (mysql_query($requete)) {
            echo "Utilisateur supprimée";
        } else
            echo "erreur lors de la suppression";
    }

    function getAll() {
        $query_search = "SELECT * FROM utilisateur";
        $query_exec = mysql_query($query_search) or die(mysql_error());
        $list = array();

        while ($result_array = mysql_fetch_array($query_exec)) {
            $user = new UtilisateurEntity();
            $user->setId($result_array["id"]);
            $user->setEtablissement($result_array["idetablissement"]);
            $user->setNom($result_array["nom"]);
            $user->setPrenom($result_array["prenom"]);
            $user->setSexe($result_array["sexe"]);
            $user->setAdress($result_array["adress"]);
            $user->setLogin($result_array["login"]);
            $user->setMdp($result_array["mdp"]);
            $user->setMail($result_array["mail"]);
            $user->setType($result_array["type"]);
            $user->setPhoto($result_array["photo"]);
            $user->setDatenaissance($result_array["datenaissance"]);

            $list[] = $user;
        }
        return $list;
    }

    function getUserById($id) {
        $query_search = "SELECT * FROM utilisateur WHERE `id` = " . $id;
        $query_exec = mysql_query($query_search) or die(mysql_error());

        $user = new UtilisateurEntity();
        if ($result_array = mysql_fetch_array($query_exec)) {
            $user->setPhoto($result_array["photo"]);
            $user->setId($result_array["id"]);
            $user->setEtablissement($result_array["idetablissement"]);
            $user->setNom($result_array["nom"]);
            $user->setPrenom($result_array["prenom"]);
            $user->setSexe($result_array["sexe"]);
            $user->setAdress($result_array["adress"]);
            $user->setLogin($result_array["login"]);
            $user->setMdp($result_array["mdp"]);
            $user->setMail($result_array["mail"]);
            $user->setType($result_array["type"]);
            $user->setDatenaissance($result_array["datenaissance"]);
        }
        return $user;
    }

    function Login($login, $pass) {
        $query_search = "SELECT * FROM utilisateur WHERE login ='" . $login . "' and mdp ='" . $pass . "' and type = 'C'";
        $query_exec = mysql_query($query_search) or die(mysql_error());

        $user = "";
        if ($result_array = mysql_fetch_array($query_exec)) {

            $user = new UtilisateurEntity();
            $user->setPhoto($result_array["photo"]);
            $user->setId($result_array["id"]);
            $user->setNom($result_array["nom"]);
            $user->setPrenom($result_array["prenom"]);
            $user->setSexe($result_array["sexe"]);
            $user->setAdress($result_array["adress"]);
            $user->setLogin($result_array["login"]);
            $user->setMdp($result_array["mdp"]);
            $user->setMail($result_array["mail"]);
            $user->setType($result_array["type"]);
            $user->setDatenaissance($result_array["datenaissance"]);
        }
        return $user;
    }

}

?>
