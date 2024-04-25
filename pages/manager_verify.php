<?php
$username = $_GET['username'];
$password = $_GET['password'];
include "./conn.php";
//参数化查询，防止sql注入
$query = "select username from manager_info where password = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result) {
  $row = mysqli_fetch_array($result);
  if ($row && $row['username'] == $username) {
    // //储存信息到session
    // session_start();
    // $_SESSION['username'] = $username;
    // $_SESSION['password'] = $password;

    /*
    没时间写session的逻辑了
    */

    //跳转页面
    header("Location: ./manage_system.html");
  } else {
    echo "访问被拒";
  }
} else {
  echo "查询出错：" . mysqli_error($conn);
}
