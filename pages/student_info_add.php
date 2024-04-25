<?php
include 'conn.php';
$name = $_POST['name'];
$stuid = $_POST['username'];
$sex = $_POST['sex'];
$password = $_POST['password'];

if (!empty($name) && !empty($stuid) && !empty($sex) && !empty($password)) {
    $query = "insert into student_info(stuid, stuname, stusex,password) values ('$stuid','$name','$sex','$password');";
    mysqli_query($conn, $query) or die("出错了，请联系管理员！(可能的错误：用户名重复)");
    echo "成功";
}else{
    echo "出错了，请联系管理员！";
}
