<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 1/7/18
 * Time: 8:06 PM
 */
require_once "tool.php";
require_once "mongoConnection.php";

$html = getContent("http://diemthi.tuyensinh247.com/diem-chuan.html");

$links = get_all_school($html);
get_mark("http://diemthi.tuyensinh247.com",$links);

