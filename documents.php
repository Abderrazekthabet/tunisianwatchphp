<?php

include_once 'dao/document_dao.php';
include_once 'connection/connection.php';


if (isset($_GET["id"])) {
    $documentDao = new DocumentDao();
    $document = $documentDao->getDocumentById($_GET["id"]);
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $document->getContent() ).'"/>';
    
}
?>