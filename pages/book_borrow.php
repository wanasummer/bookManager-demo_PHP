<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // 在这里可以使用获取到的ID进行后续操作
    echo "ID: " .$id;
} else {
    echo "ID 参数不存在";
}

if (isset($_GET["username"])) {
    $username = $_GET["username"];
    echo "username: " . $username."<br>";
} else {
    echo "username 参数不存在";
}


$currentDateTime = date("Y-m-d H:i:s");


function updateBookStatus($id,$username,$currentDateTime)
{
    include "conn.php";
    $piles = mysqli_fetch_row(mysqli_query($conn,"select piles from book where book_id = $id"))[0];
    if($piles>0){
        mysqli_query($conn, "update book set piles = piles-1 where book_id =$id");
        mysqli_query($conn, "insert into student_books(stuid, book_id, borrow_time) VALUES ('$username','$id','$currentDateTime')");
       header ("HTTP/1.1 200 Success");
    }else{
        header("HTTP/1.1 400 No Stock");
    }
    }
    updateBookStatus($id,$username,$currentDateTime);
?>