<?php
        //docraptor.hp
        require_once('/path/to/docraptor-php/autoload.php');
        $configuration = DocRaptor\configuration::getDefaultonfiguration(); //requests for API key
        $configuration -> setUsername('KEY_YOUR_API_HERE'); //works for test document 
        $docraptor = newDocRaptor\DocApi();
        $doc = new DocRaptor\doc();     //identifies the type of file required
        $doc = setDocumentContent("<html><title> convert HTML to PDF </title><body> HTML to PDF made easier </body></html");    //supply content directly
        //$doc = setDocumentUrl("http: //DocRaptor.com/returns/sales.html");    //or use a url
        $doc->setDocumentType("pdf");   //help you find the document later
        $doc->setTest(true);        //test document are free but watermarked
        //$doc->setJavaScript('true');  //enable javascript processing 
        try{
            $create_response=$DocRaptor->creatDoc($doc); //generate the document
       
        $fie = fopen("/tmp/DocRaptor-php.pdf" , "wb");
        $fwrite($file , $create_response);
        $fclose($file);

        //instructs php to return a file download 
        
        //$header('Content-Description: file Transfer');
        //$header('Content-Type: Application/pdf');
        //$header('Content-Deposition: attachment; filename=sales.pdf');
        //$header('Content-Transfer-Encoding: binary');
        //$header('Expires: 0');
        //$header('Content-Description: file Transfer');
        //$header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        //$header('Pragma: public');
        //$header('Content-Length: ' .strlen($creat-response));
        //ob_clean();
        //flush();
        //echo($create_response);
        //exit;
         } catch (DocRaptor\ApiException $Error){
            echo $error ."\n";  //shows the error
            echo $error->getMessage() ."\n";     //returns the error message
            echo $error->getCode() ."\n";   //shows the line of code with the error
         }