<?php
// 启动会话
session_start();

// 销毁会话
session_destroy();

// 重定向到登录页面
header("Location: ../index.html");
exit;
?>
