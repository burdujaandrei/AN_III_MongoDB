<?php

require_once 'connection.php';

$bulk = new MongoDB\Driver\BulkWrite;

if(isset($_POST['submit']))
{
    $target="";
    if(isset($_FILES['image']))
    {
    $target .="images/".md5(uniqid(time())).basename($_FILES['image']['name']);
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
	{
	header('Location:index.php');
	}
	else{
	$msg="Please try again!";
	}
	}
    $data = array(
        '_id' => new MongoDB\BSON\ObjectID,
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'image' => $target,
    );

$bulk->insert($data);

}

$client->executeBulkWrite('fotografii.photo', $bulk);

?>