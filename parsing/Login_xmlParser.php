<?php

include_once("connection/connection.php");
include_once("dao/utilisateur_dao.php");

class LoginXMLParser {


    function __construct($login,$password) {
        $dao = new utilisateurDao();
        $user = $dao->Login($login, $password);
        $this->setXML($user);
    }

    function setXML($utilisateur) {
        header('Content-type: text/xml; charset=UTF-8');
        $oXMLWriter = new XMLWriter;
        $oXMLWriter->openMemory();
        $oXMLWriter->startDocument('1.0', 'UTF-8');
           
            $oXMLWriter->startElement('utilisateur');
             if($utilisateur!=""){
                   $oXMLWriter->startElement('id');
                        $oXMLWriter->text($utilisateur->getId());
                   $oXMLWriter->endElement();
                 
                   $oXMLWriter->startElement('nom');
                        $oXMLWriter->text($utilisateur->getNom());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('prenom');
                        $oXMLWriter->text($utilisateur->getPrenom());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('photo');
                        $oXMLWriter->text($utilisateur->getPhoto());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('sexe');
                        $oXMLWriter->text($utilisateur->getSexe());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('adress');
                        $oXMLWriter->text($utilisateur->getAdress());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('login');
                        $oXMLWriter->text($utilisateur->getLogin());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('mdp');
                        $oXMLWriter->text($utilisateur->getMdp());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('mail');
                        $oXMLWriter->text($utilisateur->getMail());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('type');
                        $oXMLWriter->text($utilisateur->getType());
                   $oXMLWriter->endElement();
                   $oXMLWriter->startElement('datenaissance');
                        $oXMLWriter->text($utilisateur->getDatenaissance());
                   $oXMLWriter->endElement();
                   }
            $oXMLWriter->endElement();
            
        $oXMLWriter->endDocument();
        echo $oXMLWriter->outputMemory(TRUE);
    }

}

?>