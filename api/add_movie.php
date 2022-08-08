<!-- 8/8-11:25 ~ 11:55 -->
<?php
include_once "../base.php";

if(isset($_FILES['trailer']['tmp_name'])){
    $_POST['trailer']=$_FILES['trailer']['name'];
    move_uploaded_file($_FILES['trailer']['tmp_name'],'../upload'.$_FILES['trailer']['tmp_name']);
}
if(isset($_FILES['poster']['tmp_name'])){
    $_POST['poster']=$_FILES['poster']['name'];
    move_uploaded_file($_FILES['poster']['tmp_name'],'../upload'.$_FILES['poster']['name']);
}



$_POST['onload']=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
unset($_POST['year'],$_POST['month'],$_POST['day']); // 刪除
$_POST['sh']=1; // 預設都是顯示的
$_POST['rank']=$Movie->math('max','id')+1;

$Movie->save($_POST);

to("../back.php?do=movie");

// dd($_POST);
?>