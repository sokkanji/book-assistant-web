<?php
    session_start();
    header("Content-Type:application/json");
    require_once("./dbconfig.php");
    $keyword = $_GET["keyword"];

    $sql = "SELECT * FROM book_search WHERE (b_title LIKE '%$keyword%') OR (writer LIKE '%$keyword%') OR (publisher LIKE '%$keyword%') OR (bookstore LIKE '%$keyword%')"; 
    $result = mysqli_query($con, $sql);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $o = array();
    while($board = mysqli_fetch_object($result)){
        $t = new stdClass();
        $t->b_no = $board->b_no;
        $t->b_title = $board->b_title;
        $t->writer = $board->writer;
        $t->publisher = $board->publisher;
        $t->price = number_format($board->price);
        $t->img = $board->img;
        $t->bookstore=$board->bookstore;
        $o[] = $t;
    }

    echo json_encode($o);
?>