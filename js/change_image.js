// 要轮播的背景图片路径数组
var images = [
    "../images/1.jpg",
    "../images/2.jpg",
    "../images/3.jpg"
  ];
  
  // 获取背景图片容器元素
  var container = document.querySelector("body");
  
  // 定义索引变量用于追踪当前显示的图片
  var currentIndex = 0;
  
  // 定义函数用于更换背景图片
  function changeBackgroundImage() {
    // 添加渐变效果
    //container.classList.add("fade");
  
    // 延迟切换背景图片
    setTimeout(function() {
      // 更新背景图片的路径
      container.style.backgroundImage = "url(" + images[currentIndex] + ")";
  
      // 移除渐变效果
     // container.classList.remove("fade");
  
      // 增加索引，确保循环切换图片
      currentIndex = (currentIndex + 1) % images.length;
    }, 500); // 延迟时间和过渡时间保持一致
  }
  
  // 初始调用一次函数以显示初始背景图片
  changeBackgroundImage();
  
  // 每隔3秒调用一次函数以切换背景图片
  setInterval(changeBackgroundImage, 5000);
  