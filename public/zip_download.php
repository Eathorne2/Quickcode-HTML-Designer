<?php

$zipfile = $_GET['file'] ?? '';

if(file_exists($zipfile))
{
	
	header('Content-Description: File Transfer');
    header('Content-Type: '. mime_content_type($zipfile));
    header('Content-Disposition: attachment; filename="'.basename($zipfile).'"');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($zipfile));
    ob_clean();
    flush();
    readfile($zipfile);
    exit();
    
}