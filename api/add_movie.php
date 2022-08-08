<!-- 8/8-11:25 ~ 11:55 -->
<?php
include_once "../base.php";
// $_FILES == 用POST上傳陣列
if(isset($_FILES['trailer']['tmp_name'])){ // 用$_FILES上傳的陣列['']['']是否存在
    $_POST['trailer']=$_FILES['trailer']['name'];
    move_uploaded_file($_FILES['trailer']['tmp_name'],'../upload/'.$_FILES['trailer']['name']);
}
if(isset($_FILES['poster']['tmp_name'])){
    $_POST['poster']=$_FILES['poster']['name'];
    move_uploaded_file($_FILES['poster']['tmp_name'],'../upload/'.$_FILES['poster']['name']);
}



$_POST['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['day']; //$_POST的['onload'] 為 $_POST的年月日
unset($_POST['year'],$_POST['month'],$_POST['day']); // 刪除年月日
$_POST['sh']=1; // 預設都是顯示的
$_POST['rank']=$Movie->math('max','id')+1; // POST的[rank] 為 DB計算 最大 id +1

$Movie->save($_POST);

// to("../back.php?do=movie");

dd($_POST);

?>