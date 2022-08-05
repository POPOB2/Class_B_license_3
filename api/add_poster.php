<?php
include_once "../base.php";

// 確認檔案有無上傳成功 img的檔案存在會有暫存的名稱[tmp_name]
if(isset($_FILES['img']['tmp_name'])){
    // poster項目內會有img項目的名稱 為 所上傳檔案的名稱
    $poster['img']=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
}

$poster['name']=$_POST['name'];

// 1為何? 自己定義
$poster['sh']=1;

// $poster['ani']=1; // 指定1或下述
$poster['ani']=rand(1,3); // 亂數產生 , 兩者都可以 

// $poster的['rank]為 DB 計算(最大的id)+1
$poster['rank']=$Poster->math('max','id')+1; 

$Poster->save($poster);
to("../back.php?do=poster");
?>