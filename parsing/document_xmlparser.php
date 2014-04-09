<?php

include_once 'dao/document_dao.php';
include_once 'connection/connection.php';
class DocumentXMLParser {

    function __construct($id) {
        $dao = new DocumentDao();
        $list = $dao->getDocumentByIdReclamation($id);
        $this->setXML($list);
    }

    function setXML($list) {
        header('Content-type: text/xml; charset=UTF-8');
        $oXMLWriter = new XMLWriter;
        $oXMLWriter->openMemory();
        $oXMLWriter->startDocument('1.0', 'UTF-8');
        $oXMLWriter->startElement('documents');
            foreach($list as $document){
                $oXMLWriter->startElement('document');
                    $oXMLWriter->startElement('id');
                           $oXMLWriter->text($document->getId());
                    $oXMLWriter->endElement();
                $oXMLWriter->endElement();
            }
            
        $oXMLWriter->endElement();
        echo $oXMLWriter->outputMemory(TRUE);
    }

}
?>