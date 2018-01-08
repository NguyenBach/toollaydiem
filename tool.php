<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 1/7/18
 * Time: 8:07 PM
 */
require_once "simple_html_dom.php";
require_once "mongoConnection.php";

function getContent($url){
    $html = file_get_html($url);
    if($html){
        return $html;
    }else{
        return false;
    }
}
function get_all_school($html){
    $links = [];
    $ul = $html->getElementById("benchmarking");
    foreach ($ul->find("li") as $li){
        $s = new stdClass();
        $a = $li->find("a")[0];
        $s->tentruong = $a->title;
        $s->link = $a->href;
        $links[] = $s;
    }
    return $links;
}
function get_mark($parenturl,$schools){
    foreach ($schools as $school){
        $y =['2015','2016','2017'];
        foreach ($y as $year){
            $l = $school->link;
            $l = $parenturl . $l."?y=".$year;
            $html = file_get_html($l);
            $table = $html->find("div.resul-seah table")[0];
            $marks = [];
            foreach ($table->find("tr.bg_white") as $tr){
                $m = new stdClass();
                $m->manganh = $tr->children(1)->innertext;
                $m->tennganh = $tr->children(2)->innertext;
                $m->tohop = $tr->children(3)->innertext;
                $m->diem = $tr->children(4)->innertext;
                $m->ghichu = $tr->children(5)->innertext;
                $marks[] = $m;
            }
            $school->diemchuan[$year] = $marks;
        }
        addSchool($school);
    }
}
