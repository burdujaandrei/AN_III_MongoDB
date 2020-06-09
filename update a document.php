<?php

require_once 'connection.php';

$bulk = new MongoDB\Driver\BulkWrite;

$data=[
    'title' => "Jason & Statam Wedding"
];

$filter=['title'=>"Star & Wars Wedding"];
$update=['$set'=>$data];

$bulk->update($filter,$update);
$client->executeBulkWrite('fotografii.photo',$bulk);

header('location:index.php');
?>