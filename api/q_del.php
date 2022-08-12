<!--  -->
<?php

include_once "../base.php";

$del[$_POST['type']]=$_POST['target'];

// 執行的結果
// ['date'=>"2022-08-11"];
// ['movie'=>"院線片01"];==下$del
$Order->del($del);
?>