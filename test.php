<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 1/14/18
 * Time: 8:51 PM
 */
require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://34.209.89.100:27017");
$collection = $client->truongdaihoc->truongdaihoc;
$row = 1;
$cursor = $collection->find(['tentruong'=>'Trường Đại Học Bách Khoa Hà Nội']);
foreach ($cursor as $c){
    echo $c['matruong'];
}