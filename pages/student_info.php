<?php

include 'conn.php';

echo "<link href='../css/table_style.css' rel='stylesheet'>";


$display = 4;
$result = mysqli_query($conn, "select * from student_info order by stuid");
$total = mysqli_num_rows($result);
$start = (isset($_GET['start']) && ctype_digit($_GET['start']) && $_GET['start'] <= $total) ? $_GET['start'] : 0;
mysqli_data_seek($result, $start);
echo "<table>";
$count = 0;
while ($count++ < $display && $arr = mysqli_fetch_assoc($result)) {
    echo "
    <tr> 
    <td>{$arr['stuid']}</td>
    <td>{$arr['stuname']}</td>
    <td>{$arr['stusex']}</td>
    </tr>";
}
echo "<tr>
    <td colspan=3>";
if ($start > 0) {
    echo "<a href=  'student_info.php'>|第一页|</a >";
    echo "<a href='student_info.php?start=" . ($start - $display) . "'>|上一页|</a >";
}
if ($total > ($start + $display)) {
    echo "<a href={$_SERVER['student_info.php']}?start=" . ($start + $display) . ">|下一页|</a >";
    $lastpage = ($total % $display == 0) ? ($total - $display) : ($total - $total % $display);
    echo "<a href={$_SERVER['student_info.php']}?start=" . $lastpage . ">|最后一页|</a >";
}
if ($total > $display) {
    $totalpage = ceil($total / $display);
    echo "共有" . $totalpage . "页";
    $currentpage = ceil($start / $display + 1);
    echo "&nbsp现在是第" . $currentpage . "页";
}
echo "</td>
    </tr>";
echo "</table>";
