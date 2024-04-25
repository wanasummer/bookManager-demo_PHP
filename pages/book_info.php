<!DOCTYPE html>
<html>

<head>
    <title>图书信息</title>
    <meta charset="utf-8">
    <style>
        table tr:last-child td {
            border: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-container {
            float: right;
        }

        .btn-container button {
            margin-left: 10px;
        }

        .button {
            width: 100px;
            border-bottom: transparent;
        }

        input {
            width: 100%;
            padding: 4px;
        }

        .edit {
            width: 100%;
            padding: 4px;
            border: none;
            /* 隐藏边框 */
            outline: none;
            /* 隐藏聚焦时的边框 */
        }

        .edit-mode .edit {
            border: 1px solid #000;
            /* 恢复边框样式 */
        }

        
    </style>
    <script>

    </script>
</head>

<body>
    <h1>图书信息</h1>
    <table>
        <tr>
            <th>图书编号</th>
            <th>图书名称</th>
            <th>图书数量</th>
            <th>操作</th>
        </tr>
            <?php
            // 在此处编写与数据库交互的代码
            // 获取书籍信息并遍历输出
            include "conn.php";

            $result = mysqli_query($conn, "SELECT * FROM book");

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['book_id'] . "</td>";
                echo "<td>";
                echo "<input " . "class=\"edit\"" . "type=\"text\" value=\"" . $row['book_name'] . "\"readonly>";
                echo "</td>";
                echo "<td>";
                echo "<input " . "class=\"edit\"" . "type=\"text\" value=\"" . $row['piles']  . "\"readonly >";
                echo "</td>";
                echo "<td class=\"button\">";
                echo "<button onclick=\"toggleEditMode(this.parentNode.parentNode)\">编辑</button>";
                echo "<button onclick=\"deleteByBookId(" . $row['book_id'] . ")\">删除</button>";
                echo "</td>";
                echo "</tr>";
            }
            echo "<tr  id=\"newLine\">";
            echo "<td>";
            echo "</td>";
            echo "<td>";
            echo "<input " . "class=\"edit\"" . "type=\"text\" readonly>";
            echo "</td>";
            echo "<td>";
            echo "<input " . "class=\"edit\"" . "type=\"text\" readonly>";
            echo "</td>";
            echo "<td id=\"newButton\">";
            echo "<button style=\"width: 85px;\" onclick=\"addNewLine(this.parentNode.parentNode)\">新增图书</button>";
            echo "</td>";
            echo "</tr>";
            ?>
    </table>
    <script src="../js/toggle_edit.js"></script>
    <script src="../js/delete_confirm.js"></script>
    <script src="../js/add_book.js"></script>
</body>

</html>