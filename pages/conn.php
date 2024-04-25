<?php
$conn = mysqli_connect("localhost", "root", "123456") or die("数据库创建失败" . mysqli_connect_error());
mysqli_select_db($conn, "student") or die("无此数据库");
// mysqli_query($conn, "set names utf8");
?>