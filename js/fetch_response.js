// 监听表单提交事件
document.querySelector('form').addEventListener('submit', function (event) {
  event.preventDefault(); // 阻止表单默认提交

  // 获取用户名和密码
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  // 创建异步请求对象
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '../pages/handlePost.php', true);

  // 设置请求头（如果有需要）
  //xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  // 构建请求数据
  var formData = new FormData();
  formData.append('username', username);
  formData.append('password', password);

  // 发送请求
  xhr.send(formData);
  // 处理响应
  xhr.onload = function () {
    if (xhr.status === 200) {
      var response = xhr.responseText;
      console.log(response);
      if (response === "success") {
        var inputCode = document.getElementById("captcha").value.toUpperCase(); //取得输入的验证码并转化为大写
        if (inputCode.length <= 0) { //若输入的验证码长度为0
          alert("请输入验证码！"); //则弹出请输入验证码
          return;
        } else if (inputCode != code) { //若输入的验证码与产生的验证码不一致时
          alert("验证码输入错误！"); //则弹出验证码输入错误
          createCode(); //刷新验证码
          document.getElementById("Captcha").value = "";
          return;
        }
        // 验证成功，跳转到成功页面
        window.location.href = "/pages/book.php";
      } else {
        // 验证失败
        alert("用户名或密码有误");
        return;
      }
    } else {
      alert("出错了！");
    }


  }
});