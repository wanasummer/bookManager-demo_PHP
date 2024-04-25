<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Welcome</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      box-sizing: border-box;
    }

    .image {
      text-align: center;
    }

    .borrow {
      text-align: center;
      display: block;

    }

    a {
      text-decoration: none;
    }

    body {
      margin: 0;
    }

    /* 头部样式 */
    .header {
      background-color: #f1f1f1;
      padding: 20px;
      text-align: center;
    }





    /* 创建三个相等的列 */
    .column {
      float: left;
      width: 33.33%;
    }
  </style>
  <script>
    function showSuccessMessage(){
			alert("成功");
		}
    function borrow(id) {
      var username = "<?php
                      session_start();
                      echo $_SESSION["username"]
                      ?>";
      var xhttp = new XMLHttpRequest();
      xhttp.open("GET", "book_borrow.php?id=" + id + "&username=" + username, true);
      xhttp.send();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          if (this.status == 200) {
            // 成功响应
            alert("借阅成功！");
            console.log("成功响应");
            xhttp.abort();
            location.reload();
          } else if (this.status == 400) {
            // 失败响应
            alert("库存不足！");
            console.log("失败响应");
            xhttp.abort();
            // 执行相应的操作
          }
        }
      };



    }
  </script>
</head>

<body>

  <?php
  include "conn.php";
  ?>

  <div class="header">
    <h1>借书系统</h1>

  </div>


  <div class="row">
    <div class="bar">
      <p><?php
          session_start();

          // 检查会话中是否存在用户名
          if (isset($_SESSION['name'])) {
            $name = $_SESSION['name'];
            echo "欢迎你，" . $name . "!" . "<a href=\"./book_return.php\" onclick=\"showSuccessMessage()\"> 一键还书 </a>"." <a href=\"./logout.php\"> 退出 </a> ";
          } else {
            // 用户未登录的处理逻辑...
            header("Location: ../index.html");
          }
          ?></p>
    </div>
    <div class="column">
      <h2 style="text-align: center;">老人与海</h2>
      <div class=image> <img src="../images/oldman_with_sea.jpg" alt=""> </div>
      <div" class="borrow">剩余:<span style="color: red; "><?php
                                                          $result = mysqli_query($conn, "select piles from book where book_id = 1;");
                                                          if ($result) {
                                                            $row = mysqli_fetch_assoc($result);
                                                            $bookCount = strval($row['piles']);
                                                            echo "&nbsp;&nbsp;" . $bookCount;
                                                          }
                                                          ?></span><a href="#" onclick="borrow(1)">&nbsp;&nbsp;&nbsp;&nbsp;借阅</a>
    </div>
  </div>

  <div class="column">
    <h2 style="text-align: center;">假如给我三天光明</h2>
    <div class=image> <img src="../images/treedays_light.jpg" alt=""> </div>
    <div" class="borrow">剩余:<span style="color: red; "><?php
                                                        $result = mysqli_query($conn, "select piles from book where book_id = 2;");
                                                        if ($result) {
                                                          $row = mysqli_fetch_assoc($result);
                                                          $bookCount = strval($row['piles']);
                                                          echo "&nbsp;&nbsp;" . $bookCount;
                                                        }
                                                        ?></span><a href="#" onclick="borrow(2)">&nbsp;&nbsp;&nbsp;&nbsp;借阅</a>
  </div>
  </div>

  <div class="column">
    <h2 style="text-align: center;">红玫瑰旅馆的客人</h2>
    <div class=image> <img src="../images/redrose.jpg" alt=""> </div>
    <div" class="borrow">剩余:<span style="color: red; "><?php
                                                        $result = mysqli_query($conn, "select piles from book where book_id = 3;");
                                                        if ($result) {
                                                          $row = mysqli_fetch_assoc($result);
                                                          $bookCount = strval($row['piles']);
                                                          echo "&nbsp;&nbsp;" . $bookCount;
                                                        }
                                                        ?></span><a href="#" onclick="borrow(3)">&nbsp;&nbsp;&nbsp;&nbsp;借阅</a>
  </div>
  </div>
  </div>

</body>

</html>