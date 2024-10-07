<?php
include 'db.php';
$id = new MongoDB\BSON\ObjectId($_GET['id']);

$collection->deleteOne(['_id' => $id]);
header('Location: index.php');
