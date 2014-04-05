<?php

include_once("../connection/connection.php");
include_once("../entity/ReclamationEntity.php");
include_once("../entity/UtilisateurEntity.php");
include_once("../entity/DomaineEntity.php");
include_once("../entity/GeolocalistionEntity.php");
include_once("../entity/LieuEntity.php");
include_once("../entity/UtilisateurEntity.php");

class reclamationDao {

    function __construct() {
        
    }

    function getALL() {
        $query_search = "SELECT * FROM reclamation";
        $query_exec = mysql_query($query_search) or die(mysql_error());
        $list = array();
        while ($result_array = mysql_fetch_array($query_exec)) {
            $reclamation = new ReclamationEntity();
            $reclamation->setId($result_array["id"]);
            $reclamation->setTitre($result_array["titre"]);
            $reclamation->setDescription($result_array["description"]);
            $reclamation->setEtat($result_array["etat"]);
            
            $list[] = $reclamation;
        }
        return $list;
    }

    function getReclamationById($id) {
        $sql = "select * from reclamation where id = $id";
        $result = mysql_query($sql) or die(mysql_error());


        if ($result_array = mysql_fetch_array($result)) {

            $reclamation = new ReclamationEntity();
            $reclamation->setId($result_array["id"]);
            $reclamation->setTitre($result_array["titre"]);
            $reclamation->setDescription($result_array["description"]);
            $reclamation->setEtat($result_array["etat"]);
        }
        return $reclamation;
    }

    function insertReclamation(ReclamationEntity $rec) {
        
        $desc = $rec->getDescription();
        $etat = $rec->getEtat();        
        $titre = $rec->getTitre();
        
        
        $date = $rec->getDate();
        $heure = $rec->getHeure();
        
        
        $cit = $rec->getCitoyen()->getId();        
        $dom = $rec->getdomaine()->getId();
        $geo = $rec->getGeolocalisation()->getId();
        $lieu = $rec->getlieu()->getId();

        
        $req = "INSERT INTO `reclamation` (`date`, `heure`, `description`, `titre`, `idcitoyen`, `iddomaine`, `etat`, `idgeolocalisation`, `idlieu`) VALUES (now(), now(), '$desc', '$titre', '$cit', '23', '$etat', '1', '19')";
        $result = mysql_query($req) or die(mysql_error());
        if ($result) echo "ok<br>";
        else echo "err<br>";
    }

    function updateReclamation($id,ReclamationEntity $rec) {
        
        $desc = $rec->getDescription();
        $etat = $rec->getEtat();        
        $titre = $rec->getTitre();
        
        
        $date = $rec->getDate();
        $heure = $rec->getHeure();
        
        
        $cit = $rec->getCitoyen()->getId();        
        $dom = $rec->getdomaine()->getId();
        $geo = $rec->getGeolocalisation()->getId();
        $lieu = $rec->getlieu()->getId();
        
        //$req = "UPDATE Persons SET date=$date, heure=$heure,titre=$titre,idcitoyen=$cit,iddomaine=$dom->getId(),etat=$etat,idgeolocalisation=$geo->getId(),idlieu=$lieu->getId() WHERE id=$id";
        $req="UPDATE `tunisianwatch`.`reclamation` SET `date`=now(), `heure`=now(), `description`='$desc', `titre`='$titre', `idcitoyen`='$cit', `iddomaine`='$dom', `etat`='$etat', `idgeolocalisation`='$geo', `idlieu`='$lieu' WHERE `id`='$id'";
        $result = mysql_query($req) or die(mysql_error());
        if ($result)
            echo "modification ok";
        else
            echo "err modif";
    }

    function deleteReclamation($id) {

        $requete = " delete from reclamation where id= '$id' ; ";

        if (mysql_query($requete)) {
            echo "Utilisateur supprimée";
        }
        else
            echo "erreur lors de la suppression";
    }

}

/*$rec = new reclamationDao();
echo "<br>";
$rec1 = new ReclamationEntity();

//$rec1->setDate(new DateTime("Y-m-d H:i:s", "2014/01/01"));
$rec1->setDescription("farouk");
$rec1->setEtat(0);
//$rec1->setHeure(new DateTime("H:i:s", 22, 22, 22));
$rec1->setTitre("farouk");

$gLoc = new GeolocalisationEntity();
    $gLoc->setId(1);
    $gLoc->setLat("");
    $gLoc->setLon("");
$rec1->setGeolocalisation($gLoc);

$lL=new LieuEntity();
    $lL->setId(4);
    $lL->setVille("tiger");
$rec1->setlieu($lL);

$dD=new DomaineEntity();
    $dD->setId(23);
    $dD->setNom("tiger");
$rec1->setdomaine($dD);

$citoyen=new UtilisateurEntity();
    $citoyen->setId(2);
$rec1->setCitoyen($citoyen);

$rec->insertReclamation($rec1);
$rec1->setEtat(1);
//$rec->updateReclamation(34, $rec1);
$list = $rec->getALL();
$dom = $rec->getReclamationById(1)->getDescription();
echo "$dom<br>";
foreach ($list as $item) {
    echo $item->getId() . "<br>";
}*/
?>