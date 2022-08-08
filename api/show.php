<!-- 8/8-14:17 ~ 14:53 -->
<?php
include_once "../base.php";


$row=$Movie->find($_POST['id']);

// if($row['sh']==1){
//     $row['sh']=0;
// }else{
//     $row['sh']=1;
// }
// $Movie->save($row);

// 用三元運算式簡化
$row['sh']=($row['sh']==1)?0:1;
$Movie->save($row);

// 更短 少四個字 (差別:相較於上述的if凾式, 直接運算加法結果 在效能上會更好)
// $row['sh']=($row['sh']+1)%2;
// $Movie->save($row);
?>