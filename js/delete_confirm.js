function deleteByBookId(book_id) {
    var result = confirm("你正在进行一个危险操作，确认要执行这个操作吗？（删除id<4的图书可能导致网页无法显示）");
    if (result) {
        result = 1;
    } else {
        result = 0;
    }
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "book_delete.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("result=" + encodeURIComponent(result) + "&book_id=" + encodeURIComponent(book_id));
    xhr.onload = function () {
        if (xhr.status === 200) {
          location.reload();
        } else {
          alert("出错了！");
          location.reload();

        }
      }
}