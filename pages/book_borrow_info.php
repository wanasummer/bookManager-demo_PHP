<!DOCTYPE html>
<html>

<head>
    <title>图书信息</title>
    <meta charset="utf-8">
    <style>
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
    </style>
</head>

<body>
    <h1>借书信息</h1>
    <table style="width: 900px;">
            <tr>
                <th>学生ID</th>
                <th>借书名称</th>
                <th style="width: 300px;">借书时间</th>
            </tr>
        <tbody>
            <?php
            // 在此处编写与数据库交互的代码
            // 获取书籍信息并遍历输出
            include "conn.php";

            $result = mysqli_query($conn, "SELECT * FROM student_books");

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['stuid'] . "</td>";
                echo "<td>" . $row['book_id'] . "</td>";
                echo "<td>" . $row['borrow_time'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>