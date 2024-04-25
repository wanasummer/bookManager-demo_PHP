function toggleEditMode(row) {
    var inputElement = row.querySelectorAll(".edit");
    var cells = row.getElementsByTagName("td");
    var button = cells[cells.length - 1].getElementsByTagName("button")[0];

    if (row.classList.contains("edit-mode")) {
        // 切换为非编辑模式
        row.classList.remove("edit-mode");
        button.innerHTML = "编辑";
        // 获取图书信息
        var bookId = row.querySelector("td:first-child").innerText;
        var bookName = inputElement[0].value;
        var piles = inputElement[1].value;

        var inputElements = row.querySelectorAll(".edit");
        for (var i = 0; i < inputElements.length; i++) {
            inputElements[i].readOnly = true;
        }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "book_update.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("bookId=" + encodeURIComponent(bookId) + "&bookName=" + encodeURIComponent(bookName) + "&piles=" + encodeURIComponent(piles));            
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // 请求成功
                        console.log("数据更新成功");
                        location.reload(false);
                    } else {
                        // 请求失败
                        console.error("数据更新失败");
                    }
                }
            }; 


    } else {
        // 切换为编辑模式
        row.classList.add("edit-mode");
        button.innerHTML = "完成";
        var inputElements = row.querySelectorAll(".edit");
        for (var i = 0; i < inputElements.length; i++) {
            inputElements[i].readOnly = false;
        }

    }
}