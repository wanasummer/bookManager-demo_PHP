<?php
$bookId = $_POST['bookId'];
$bookName = $_POST['bookName'];
$piles = $_POST['piles'];

// 数据库连接
include "conn.php";

$query = "update book set book_name = '$bookName' ,piles=$piles where book_id=$bookId";

$result = mysqli_query($conn, $query);

if (!$result) {
    // 操作失败，打印错误信息
    $errorMessage = mysqli_error($conn);
    echo "数据库操作失败：" . $errorMessage;
    mysqli_close($conn);
}
$getMax = mysqli_query($conn, "SELECT book_id FROM book WHERE book_id = (SELECT MAX(book_id) FROM book)");
$row = mysqli_fetch_assoc($getMax);
echo var_dump(intval($row['book_id']));
echo var_dump($bookId - 1);
if (intval($row['book_id']) == ($bookId - 1)) {
    echo "test";
include "book_add.php";
}
// 关闭数据库连接
mysqli_close($conn);
