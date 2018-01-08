<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 1/7/18
 * Time: 8:46 PM
 */

require 'vendor/autoload.php';

$dbName = 'diemchuan';
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->diemchuan->diemchuan;
function addSchool($schools){
    global $collection;
   $result =  $collection->insertOne($schools);
   return $result;
}