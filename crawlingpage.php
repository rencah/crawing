<?php 
require 'vendor/autoload.php';
use PHPHtmlParser\Dom;
$dom = new Dom; 
if (isset($_GET['url'])) {
	//echo $_GET['url'];
	header('Content-Type: application/json');
	$dom->loadFromUrl($_GET['url']);
    $as =  $dom->find('a');
    $data = [];
     foreach ($as as $value) {
        if($value->href != null){
           if (filter_var($value->href, FILTER_VALIDATE_URL) !== FALSE) {
            $data [] .= $value->href;
            }
        }
     } 
     echo json_encode($data, true);
}


 ?>