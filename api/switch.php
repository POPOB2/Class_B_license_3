<!-- 8/8-10:12 ~ 10:31 -->
<?php
include_once "../base.php";

$table=$_POST['table']; // POST傳來的資料表名稱
$DB=new DB($table); // 將該資料表DB 設成一個變數

$ids=$_POST['id']; // POST傳來的id
$row0=$DB->find($ids[0]); // 從$DB 查詢單筆(查詢$ids的[0值])
$row1=$DB->find($ids[1]); // 從$DB 查詢單筆(查詢$ids的[1值])


$rank=$row0['rank']; // 先把$row0的rank存給$rank
$row0['rank']=$row1['rank']; // 再把$row1的rank存給$row0的rank
$row1['rank']=$rank; // 再把$rank的內容(原$row0的rank)給$row1的rank , 就可以完成0和1兩個值的交換

// 再把交換後的資料存起來
$DB->save($row0);
$DB->save($row1);

?>