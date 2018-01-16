<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 1/14/18
 * Time: 9:43 AM
 */
require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://34.209.89.100:27017");
$collection = $client->truongdaihoc->truongdaihoc;
$row = 1;

if (($handle = fopen("csvc.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $truong = $data[0];
        $cs = $collection->find(['tentruong'=>$truong]);
        foreach ($cs as $c){
            echo $c['_id'];
        }
    }
    fclose($handle);
}