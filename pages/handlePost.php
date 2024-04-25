<?php

$username = $_POST['username'];
$password = $_POST['password'];

// 数据库连接
include "conn.php";

// 参数化查询
$query = "SELECT password FROM student_info WHERE stuid = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result) {
  $row = mysqli_fetch_array($result);
  if ($row && $row['password'] == $password) {
    // 登录验证成功后，将用户名存储到会话中
    $name = strval(mysqli_fetch_assoc(mysqli_query($conn, "select stuname from student_info where stuid = '$username';"))['stuname']);
    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['username'] = $username;
    echo "success";
  } else {
    echo "failure";
  }
} else {
  echo "查询出错：" . mysqli_error($conn);
}

// 关闭数据库连接
mysqli_close($conn);
