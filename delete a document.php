<?php

require_once 'connection.php';

$bulk= new MongoDB\Driver\BulkWrite;

$filter=['title'=>"Star & Wars Wedding"];

$bulk->delete($filter);

$client->executeBulkWrite('fotografii.photo',$bulk);

header('location:index.php');

?>