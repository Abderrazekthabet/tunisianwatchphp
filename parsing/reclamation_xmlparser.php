<?php

include_once 'dao/reclamation_dao.php';
include_once 'connection/connection.php';

class ReclamationXMLParser {

    function __construct($id) {
        $dao = new reclamationDao();
        if ($id == 0) {
            $list = $dao->getALL();
        } else {
            $list[] = $dao->getReclamationById($id);
        }
        $this->setXML($list);
    }

    function setXML($listReclamations) {
       header('Content-type: text/xml; charset=UTF-8');
        $oXMLWriter = new XMLWriter;
        $oXMLWriter->openMemory();
        $oXMLWriter->startDocument('1.0', 'UTF-8');
  
        
        $oXMLWriter->startElement('reclamations');
            foreach($listReclamations as $recalamtion){
            $oXMLWriter->startElement('reclamation');
                   $oXMLWriter->startElement('id');
                        $oXMLWriter->text($recalamtion->getId());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('titre');
                        $oXMLWriter->text($recalamtion->getTitre());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('description');
                        $oXMLWriter->text($recalamtion->getDescription());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('date');
                        $oXMLWriter->text($recalamtion->getDate());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('heure');
                        $oXMLWriter->text($recalamtion->getHeure());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('citoyen');
                        $oXMLWriter->text($recalamtion->getCitoyen());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('domaine');
                        $oXMLWriter->text($recalamtion->getdomaine());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('etat');
                        $oXMLWriter->text($recalamtion->getEtat());
                   $oXMLWriter->endElement();
                   
                   $oXMLWriter->startElement('commentaires');
        foreach ($recalamtion->getCommentaires() as $commentaire) {
            $oXMLWriter->startElement('commentaire');
            $oXMLWriter->startElement('idcommentaire');
            $oXMLWriter->text($commentaire->getId());
            $oXMLWriter->endElement();
            $oXMLWriter->startElement('texte-commentaire');
            $oXMLWriter->text($commentaire->getTexte());
            $oXMLWriter->endElement();
            $oXMLWriter->startElement('user-commentaire');
            $oXMLWriter->text($commentaire->getUser());
            $oXMLWriter->endElement();
            
            $oXMLWriter->startElement('date-commentaire');
            $oXMLWriter->text($commentaire->getDate());
            $oXMLWriter->endElement();
            $oXMLWriter->endElement();
        }
        $oXMLWriter->endElement();
                   
                   $oXMLWriter->startElement('geolocalisation');
                   if($recalamtion->getGeolocalisation()!=""){
                    $oXMLWriter->startElement('idgeolocalisation');
                    $oXMLWriter->text($recalamtion->getGeolocalisation()->getId());
                   $oXMLWriter->endElement();
                    $oXMLWriter->startElement('lon');
                    $oXMLWriter->text($recalamtion->getGeolocalisation()->getLon());
                   $oXMLWriter->endElement();

                   $oXMLWriter->startElement('lat');
                    $oXMLWriter->text($recalamtion->getGeolocalisation()->getLat());
                   $oXMLWriter->endElement();
                   }
                   $oXMLWriter->endElement();
                    $oXMLWriter->startElement('documents');
            foreach ($recalamtion->getListDoc() as $document) {
                $oXMLWriter->startElement('document');
                $oXMLWriter->startElement('id-document');
                $oXMLWriter->text($document->getId());
                $oXMLWriter->endElement();
                $oXMLWriter->endElement();
            }
            $oXMLWriter->endElement();
                   $oXMLWriter->startElement('ville');
                        $oXMLWriter->text($recalamtion->getlieu());
                   $oXMLWriter->endElement();
            $oXMLWriter->endElement();
            }
        $oXMLWriter->endElement();
        $oXMLWriter->endDocument();
        echo $oXMLWriter->outputMemory(TRUE);
    }

}
?>
