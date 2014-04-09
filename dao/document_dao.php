<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of document_dao
 *
 * @author Farouk
 */
include_once("entity/DocumentEntity.php");
include_once 'connection/connection.php';

class DocumentDao {

    function getDocumentByIdReclamation($idRec) {
        $sql = "select * from document where type = 1 and idreclamation = " . $idRec;
        $result = mysql_query($sql) or die(mysql_error());
        $list = array();

        while ($result_array = mysql_fetch_array($result)) {

            $document = new DocumentEntity();
            $document->setId($result_array["id"]);
            $document->setIdreclamation($result_array["idreclamation"]);
            $document->setNom($result_array["nom"]);
            $document->setType($result_array["type"]);
            $document->setUrl($result_array["url"]);

            $list[] = $document;
        }
        return $list;
    }

    function getDocumentById($id) {
        $sql = "select * from document where type = 1 and id = " . $id;
        $result = mysql_query($sql) or die(mysql_error());
        $list = array();
        $document = "";
        if ($result_array = mysql_fetch_array($result)) {

            $document = new DocumentEntity();
            $document->setId($result_array["id"]);
            $document->setIdreclamation($result_array["idreclamation"]);
            $document->setNom($result_array["nom"]);
            $document->setType($result_array["type"]);
            $document->setUrl($result_array["url"]);

        }
        return $document;
    }

    function insertDocument(DocumentEntity $doc) {

        $idReclamation = $doc->getIdreclamation();
        $nom = $doc->getNom();
        $type = $doc->getType();
        if ($type == 1)
            $url = "null";
        else
            $url = $doc->getUrl();
        if ($type != 1)
            $content = "null";

        $req = "INSERT INTO `document` (`idreclamation`, `nom`, `type`, `url`) VALUES ('$idReclamation', '$nom', '$type', '$url')";
        $id = mysql_query($req) or die(mysql_error());
        return $id;
    }

}

?>
