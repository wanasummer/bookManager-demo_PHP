function addNewLine(line) {
    // 判断是否已存在新增按钮

    if (document.querySelector(".add-button") !== null) {
        return; // 如果已存在，则不进行添加
    }

    var table = document.querySelector("table");
    var newLine = table.insertRow();
    newLine.innerHTML = `
        <tr id="newLine">
        <td></td>
        <td><input class="edit" type="text" readonly></td>
        <td><input class="edit" type="text" readonly></td>
        <td id="newButton"><button class="add-button" style="width: 85px;" onclick="addNewLine(this.parentNode.parentNode)">新增图书</button></td>
        </tr>

    `;



    // 创建编辑按钮
    var editButton = document.createElement("button");
    editButton.textContent = "编辑";
    editButton.onclick = function () {
        toggleEditMode(line);
    };


    // 创建删除按钮
    var deleteButton = document.createElement("button");
    deleteButton.textContent = "删除";
    deleteButton.onclick = function () {
        deleteByBookId(line.dataset.bookId);
    };


    // 替换新增按钮
    var buttonContainer = document.getElementById("newButton");
    buttonContainer.innerHTML = ""; // 清空容器
    buttonContainer.appendChild(editButton);
    buttonContainer.appendChild(deleteButton);

    var inputElement = line.querySelectorAll(".edit");
    inputElement[0].parentNode.previousElementSibling.innerHTML=parseInt(line.previousElementSibling.querySelector("td").innerHTML)+1;

    /* // 获取图书信息
    var inputElement = line.querySelectorAll(".edit");
    var book_id = inputElement[0].value;
    var book_name = inputElement[1].value
    var piles = inputElement[2].value
    //发送异步请求
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "book_add.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("book_id=" + encodeURIComponent(book_id) + "&book_name=" + encodeURIComponent(book_name) + "&piles=" + encodeURIComponent(piles));
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // 请求成功
                console.log("数据更新成功");
            } else {
                // 请求失败
                console.error("数据更新失败");
            }
        }
    }; */
}