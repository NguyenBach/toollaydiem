<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 1/14/18
 * Time: 8:11 AM
 */

require_once "simple_html_dom.php";
//require_once "mongoConnection.php";
require 'vendor/autoload.php';
$dbName = 'diemchuan';
$client = new MongoDB\Client("mongodb://34.209.89.100:27017");
$collection = $client->truongdaihoc->truongdaihoc;

$html = file_get_html("http://www.thongtintuyensinh.vn/Thong-tin-tuyen-sinh_C51_D1702.htm");
$table = $html->find('table.MsoNormalTable')[0];
foreach($table->find("tr") as $key => $tr){
    if($key == 0) continue;
    $truong = new stdClass();
    $truong->matruong = trim($tr->childNodes(1)->plaintext);
    $truong->tentruong = trim($tr->childNodes(2)->plaintext);
    if(strpos($truong->tentruong,"(*)")) $truong->he = "Dân lập"; else $truong->he = "Công lập";
    $truong->vung = "TP. Hồ Chí Minh";
    $collection->insertOne($truong);
}
echo "OK";