<?php
/* require_once("dbtools.php")

$book_id = $_GET["book_id"];
 $mode =  $_GET["mode"];

 	$bookid = 1;
 	$img = "ACL037300.jpg";
 	$des = "價格：350";

     $oj =array('book_id' => $bookid,'image_name' =>$img ,'description' => $des);

     $jj =json_encode($oj);

     echo $jj ;
*/
     echo json_encode(array("book_id" => 1, "image_name" => "ACL037300.jpg", "description" => "價格：350"));
?>