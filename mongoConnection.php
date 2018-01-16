<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 1/7/18
 * Time: 8:46 PM
 */

require 'vendor/autoload.php';

$dbName = 'diemchuan';
$client = new MongoDB\Client("mongodb://34.209.89.100:27017");
$collection = $client->truongdaihoc->truongdaihoc;

function addSchool($schools){
    global $collection;
   $result =  $collection->insertOne($schools);
   return $result;
}
$a = $collection->find();
foreach ($a as $b){
    echo $b->tentruong;
}