<?php
$bookId = $_POST['book_id'];

$result = boolval($_POST['result']);
var_dump($result);

// 数据库连接
include "conn.php";

$query = "delete from book where book_id = $bookId";

$sql_result=false;

if($result){
    $sql_result = mysqli_query($conn,$query);
}

if (!$sql_result) {
    // 操作失败，打印错误信息
    $errorMessage = mysqli_error($conn);
    echo "数据库操作失败：" . $errorMessage;
}

// 关闭数据库连接
mysqli_close($conn);

?>