<?php
header("Content-Type:application/json");
require_once("../base/dbconfig.php");
$keyword = $_GET['keyword'];


$sql = "SELECT * FROM bookstore WHERE b_title LIKE '%$keyword%'"; 
$result = mysqli_query($con, $sql);
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$o = array();
while($board = mysqli_fetch_object($result)){
    $t = new stdClass();
    $t->b_title = $board->b_title;
    $t->b_address = $board->b_address;
    $t->b_connect = $board->b_connect;
    $t->b_like = $board->b_like;
    $t->b_site = $board->b_site;
    $t->b_insta = $board->b_insta;
    $t->b_face = $board->b_face;
    $t->b_blog = $board->b_blog;
    $t->lat=$board->lat;
    $t->lng=$board->lng;
    $t->intro = $board->intro;
    $o[] = $t;
}

echo json_encode($o);
?>