<?php
$bookId = $_POST['bookId'];
$bookName = $_POST['bookName'];
$piles = $_POST['piles'];


// 数据库连接
include "conn.php";

$query = "insert into book(book_id, book_name, piles)  values ($bookId,'$bookName',$piles)";



$result = mysqli_query($conn,$query);

if (!$result) {
    // 操作失败，打印错误信息
    $errorMessage = mysqli_error($conn);
    echo "数据库操作失败：" . $errorMessage;
}

// 关闭数据库连接
mysqli_close($conn);
