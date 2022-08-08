<!-- 8/8-14:17 ~ 14:53 -->
<?php
include_once "../base.php";

// $table=$_POST['table']; // POST傳來的資料表名稱
// $DB=new DB($table); // 將該資料表DB 設成一個變數
// $DB->del($_POST['id']); // 刪除 POST傳來的id

// 兩行
$DB=new DB($_POST['table']);
$DB->del($_POST['id']);

// 一行, 不建議 僅用於理解
// (new DB($_POST['table']))->del($_POST['id']);



?>