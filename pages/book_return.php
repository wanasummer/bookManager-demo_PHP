<?php
include "conn.php";
session_start();
$username = $_SESSION['username'];

$piles = mysqli_fetch_row(mysqli_query($conn, "select count(*) number from student_books where stuid = '$username';"))[0];
if ($piles > 0) {
    mysqli_query($conn, "
    UPDATE book b
        JOIN (
            SELECT book_id, COUNT(*) AS number
            FROM student_books
            WHERE stuid = '$username'
            GROUP BY book_id
        ) s ON b.book_id = s.book_id
    SET b.piles = b.piles + s.number");

    mysqli_query($conn, "delete from student_books where stuid = '$username'");

    header("Location: ./book.php");
} else {
   
    header("Location: ./book.php");
}
