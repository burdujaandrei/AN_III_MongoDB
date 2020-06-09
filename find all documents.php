<?php

require_once 'connection.php';

$query = new MongoDB\Driver\Query([]);
$rows = $client->executeQuery("fotografii.photo",$query);

foreach ($rows as $doc)
{
    
    echo $doc->nume. "<br/";
}
        
?>